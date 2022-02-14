<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHI TIẾT SẢN PHẨM</title>
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
		#chi_tiet{
			width: 74.5%;
			height: 210px;
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
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: #4CAF50;
			color: white;
		}
		#inforr button:hover{
			background-color: #FEFDE5 ;
		}
	</style>
</head>
<body>
	<div id="tong">
		<?php
		
		?>
		<?php include("include/user_side_bar.php") ?>
		<div>
			<?php 
			include 'include/tool.php';
			?>
			
		</div>
		<div id="chi_tiet" align="center">
			<div id="header">
				<h3>CHI TIẾT SẢN PHẨM</h3>
			</div>
			<div>
				<table>
					<tr height="50px">
						<th width="170px">TÊN SẢN PHẨM</th>
						<th width="150px">GIÁ TIỀN</th>
						<th width="170px">SỐ LƯỢNG CÒN LẠI</th>
						<th width="260px">MÔ TẢ</th>
						<th width="150px">NHÀ PHÂN PHỐI</th>
					</tr>	
					
					<?php
					$ma_sp = $_GET['ma_sp'];
					include 'include/open_sql.php';

					$sql = "SELECT * from san_pham WHERE ma_sp='$ma_sp' ";
					$result = mysqli_query($con,$sql); 

					?>
					<?php 
					while($row = mysqli_fetch_array($result)){
						
						?>
						<img src="<?php echo $row['image'] ?>" alt="" height="300px" width="300px">
						<tr align="center">  
							<td width="170px"><?php echo '<li>' . $row['ten_sp'] . '</li>' ?></td>
							<td width="150px"><?php echo '<li>' . $row['gia_tien'] .'.000đ'. '</li>' ?></td>
							<td width="170px"><?php echo '<li>'. $row['so_luong'] .' sp'. '</li>' ?> </td>
							<td width="260px"><?php echo '<li>'. $row['mo_ta'] . '</li>' ?></td>
							<td width="150px"><b>
								<?php
								if ($row["nha_pp"]=="1") {
									echo "Qhang";
								} ?></b>	
							</td>
						</tr> 
						<tr height="50px" align="center"><td colspan="5"><?php include 'include/them_gio_hang.php';	?></td></tr>					  
					<?php } 
					?>
				</table>
			</div>			
		</div>
		<?php include ("include/infor.php") ?>

		<?php include("include/move.php") ?>
	</div>
</body>
</html>