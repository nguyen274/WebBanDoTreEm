<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chi tiết hóa đơn</title>
	<?php include("include/icon.php")?>
	<link rel="stylesheet" type="text/css" href="css/BS.css">
	<style type="text/css">
		#right_content_1{
			border-radius: 5px;
			background: #F1BBBB;
			text-align: center;
			height: 100px;
		}
		#right_content_2{
			background-image: url(https://www.downtowndental.ca/wp-content/uploads/2016/04/simple-gray-texture.jpg);
			height: 550px;
		}
		table{
			font-size: 20px;
			width: 80%;
		}
	</style>
</head>
<body>
	<div id="tong">
		<?php include("include/user_side_bar.php") ?>
		<div id="right_content">
			<?php 
			include 'include/tool.php';
			?>
		</div>

		<div id="right_content_1">
			<h1>CHI TIẾT ĐƠN HÀNG</h1>
		</div>
		<?php
			include("include/open_sql.php");
			if (isset($_GET["id"])) {
				$id = $_GET["id"];
			}
			$sql = "SELECT khach_hang.ten_kh, khach_hang.dien_thoai, hoa_don.dia_chi, san_pham.ten_sp, hoa_don.ngay_mua, hoa_don_chi_tiet.so_luong FROM hoa_don JOIN khach_hang ON hoa_don.ma_kh = khach_hang.ma_kh JOIN hoa_don_chi_tiet JOIN san_pham ON hoa_don_chi_tiet.san_pham = san_pham.ma_sp WHERE hoa_don.ma_hd = '$id'";
			$result = mysqli_query($con, $sql);
			include("include/close_sql.php");
		?>

		<div id="right_content_2">
			<?php
				$hd = mysqli_fetch_array($result);
			?>
			<table cellpadding="5px">
				<tr>
					<td>Tên khách hàng:</td>
					<td><?php echo $hd["ten_kh"]; ?></td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td><?php echo $hd["dien_thoai"]; ?></td>
				</tr>
				<tr>
					<td>Địa chỉ nhận hàng:</td>
					<td><?php echo $hd["dia_chi"]; ?></td>
				</tr>
				<tr>
					<td>Ngày mua:</td>
					<td><?php echo $hd["ngay_mua"]; ?></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>