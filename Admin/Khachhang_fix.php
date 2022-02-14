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
	$sql = "SELECT * FROM khach_hang WHERE ma_kh = '$ma'";

	$result = mysqli_query($con, $sql);

	$kh = mysqli_fetch_array($result);

	include("../include/close_sql.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin khách hàng</title>
	<link rel="stylesheet" href="../css/Sua_kh.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php"); ?>

		<div id="sua_kh">
			<?php include("../include/logout_bar.php") ?>
			<form method="post" action="../process/sua_kh_process.php">
				<div id="banner">
					<h1>SỬA THÔNG TIN KHÁCH HÀNG</h1>
				</div>

				<hr>
	
				<table cellpadding="5px" cellspacing="0">
					<tr>
						<input type="hidden" name="id" value="<?php echo $ma;?>">
					</tr>
					<tr>
						<td>Tên khách hàng:</td>
						<td><input type="text" name="ten" required="" value="<?php echo $kh["ten_kh"] ?>"></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="user" required="" value="<?php echo $kh["username"] ?>"></td>
					</tr>
					<tr>
						<td>Điện thoại:</td>
						<td><input type="text" name="phone" required="" value="<?php echo $kh["dien_thoai"] ?>"></td>
					</tr>
					<tr>
						<td>Ngày sinh:</td>
						<td><input type="date" name="dob" required="" value="<?php echo $kh["ngay_sinh"] ?>"></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" required="" value="<?php echo $kh["email"] ?>"></td>
					</tr>
					<tr>
						<td>Trạng thái:</td>
						<td>
							<input type="radio" name="trang_thai" value="1" <?php if($kh['trang_thai'] == "1") { echo "checked"; } ?>>Activate
							&nbsp;&nbsp;
							<input type="radio" name="trang_thai" value="0" <?php if($kh['trang_thai'] == "0") { echo "checked"; } ?>>Deactivate
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php
								if (isset($_GET["error"])) {
									echo 'Sửa thông tin thất bại.';
								}
							?>
							<br>
							<br>
							<button>Sửa thông tin</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>