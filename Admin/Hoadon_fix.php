<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<?php
	$ma = -1;
	if (isset($_GET["id"])) {
		$ma = $_GET["id"];
	}

	include("../include/open_sql.php");
	$sql = "SELECT * FROM hoa_don WHERE ma_hd = '$ma'";

	$result = mysqli_query($con, $sql);

	$hd = mysqli_fetch_array($result);

	include("../include/close_sql.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thao tác với hóa đơn</title>
	<link rel="stylesheet" href="../css/Sua_npp.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="sua_npp">
			<?php include("../include/logout_bar.php") ?>
			<form method="post" action="../process/sua_hd_process.php">
				<div id="banner">
					<h1>THAO TÁC HÓA ĐƠN</h1>
				</div>

				<hr>

				<table cellpadding="5px" cellspacing="0">
					<tr>
						<td colspan="2">
							<input type="hidden" name="id" value="<?php echo $ma;?>">
						</td>
					</tr>
					<tr>
						<td>Địa chỉ người nhận:</td>
						<td><input type="text" required="" name="dia_chi" value="<?php echo $hd["dia_chi"] ?>"></td>
					</tr>
					<tr>
						<td>Duyệt/Hủy:</td>
						<td>
							<input type="radio" name="trang_thai" value="approved">Duyệt
							<input type="radio" name="trang_thai" value="cancelled">Hủy
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php 
								if (isset($_GET["error"])) {
									echo 'Sửa thất bại.';
								}
							?>
							<br>
							<br>
							<button>Sửa</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>