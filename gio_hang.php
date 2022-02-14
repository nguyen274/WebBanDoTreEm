<?php
session_start();
if(!empty($_SESSION["gio_hang"])){
	$gio_hang = $_SESSION["gio_hang"];
	
}
$tongTien = 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>THÔNG TIN GIỎ HÀNG</title>
	<link rel="stylesheet" type="text/css" href="css/BS.css">
	<?php include("include/icon.php") ?>
	<style>
		#tool{
			width: 74.5%;
			height: 110px;
			float: right;
			position: relative;
			background-color: white ;
			border-left: 4px outset #ea654d;
		}
		#cart{
			background-color: #FC8787 ;
			padding: 3px 4px ;
			border-radius: 15px;
			border:1px solid #FF0012;
			position:absolute;
			left: 900px;
			top:55px;
			box-shadow: 5px 7px 8px #888888;
		}
		#cart:hover{
			opacity: 80%;
		}
		#gio_hang{
			width: 74.5%;
			height: 110px;
			float: right;
			font-family: segoe ui light;
			margin-top: 10px;
			height: 600px;
		}
		#inforr{
			background: #E9FFFF;
			color: black;
			padding: 10px;
			font-size: 20px;
			text-align: center;
			margin: 0 0 30px;
			border-radius: 15px;
			height: 450px;
			overflow: scroll;
		}
		#header{
			background: #243a76;
			color: white;
			padding: 1px;
			font-size: 15px;
			text-align: center;
			margin: 0 0 30px;
			border-radius: 15px;
		}
		#inforr a{
			background: white;
			color: black;
			font-weight: bold;
			border: 2px solid black ; 
			padding: 2px 8px ;
			border-radius: 5px;
			text-decoration: none;
		}
		td{
			font-weight: bold;
		}
		th{
			color: red;
		}
		#inforr button:hover{
			background-color: #FEFDE5 ;
		}
	</style>
</head>
<body>
	<div id="tong">
		
		<?php include("include/user_side_bar.php") ?>
		<div>
			<?php 
			include 'include/tool.php';
			?>
			
		</div>
		<div id="gio_hang" align="center">
			<div id="header">
				<h3>THÔNG TIN SẢN PHẨM</h3>
			</div>
			<div id="inforr">
				<form action="sua_gio_hang.php" method="post">
					<table>
						<tr>
							<th width="220px">TÊN SẢN PHẨM</th>
							<th width="80px">ẢNH</th>
							<th width="150px">GIÁ SẢN PHẨM</th>
							<th>SỐ LƯỢNG</th>
							<th width="150px">THÀNH TIỀN</th>
							<th></th>
						</tr>
						<?php
						include("include/open_sql.php");
						if(isset($gio_hang)){

							foreach ($gio_hang as $ma_sp => $soLuong) {
								$sql = "SELECT * FROM san_pham WHERE ma_sp='$ma_sp'";
								$result = mysqli_query($con, $sql);
								if($result != null){
									while($san_pham = mysqli_fetch_array($result)){
										
										?>
										<tr>
											<td><?php echo $san_pham["ten_sp"]; ?></td>
											<td><img src="<?php echo $san_pham['image'] ?>" alt="" height="40px" width="40px"></td>
											<td><?php echo $san_pham["gia_tien"]; ?>.000đ</td>
											<td>
												<input type="number" min="1" name="gio_hang[<?php echo $san_pham["ma_sp"] ?>]" value=<?php echo $soLuong; ?>
											</td>
											<td><?php $thanhTien = $soLuong * $san_pham["gia_tien"];
											echo $thanhTien; ?>.000đ</td>
											<td><a href="xoa_gio_hang.php?ma_sp=<?php echo $san_pham["ma_sp"] ?>">Xóa</a></td>
										</tr>
										<?php
										$tongTien = $tongTien + $thanhTien;
									}}}}
									include("include/close_sql.php");
									?>
								</table>
								<br>
								<button>Cập nhật giỏ hàng</button>
							</form>			
							<?php 
							if(isset($_SESSION['gio_hang'])){ ?>
								<h1>Tổng tiền đơn hàng : <font color="red"><?php echo $tongTien; ?>.000đ</font> </h1>				
								<form action="hoa_don.php" method="GET">
									Địa chỉ nhận hàng: <input type="text" name="dia_chi_nhan_hang" required="">
									<button>Đặt mua</button>
								</form>
							<?php } ?>
						</div>
					</div>
					<div>
						
					</div>
					<?php include ("include/infor.php") ?>

					<?php include("include/move.php") ?>
				</div>
			</body>
			</html>