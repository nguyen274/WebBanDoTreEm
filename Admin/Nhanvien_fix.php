<?php
	session_start();
	if (!isset($_SESSION["admin"])) {
		header("location: Admin_login.php");
	}
	if (isset($_SESSION["nv"])) {
		unset($_SESSION["nv"]);
		header("location: Admin_login.php");
	}
?>
<?php
	$ma = -1;
	if (isset($_GET["id"])) {
		$ma = $_GET["id"];
	}

	include("../include/open_sql.php");
	$sql = "SELECT * FROM nhan_vien WHERE ma_nv = '$ma'";

	$result = mysqli_query($con, $sql);

	$nv = mysqli_fetch_array($result);

	include("../include/close_sql.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin nhân viên</title>
	<link rel="stylesheet" href="../css/Sua_nhan_vien.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="sua_nhan_vien">
			<?php include("../include/logout_bar.php") ?>
			<form method="post" action="../process/sua_nhan_vien_process.php">
					<div id="banner">
						<h1>SỬA THÔNG TIN NHÂN VIÊN</h1>
					</div>

					<hr>

					<table cellpadding="5px" cellspacing="0">
						<tr>
							<input type="hidden" name="id" value="<?php echo $ma;?>">
						</tr>
						<tr>
							<td>Tên nhân viên:</td>
							<td><input type="text" name="ho_ten" value="<?php echo $nv["ten_nv"] ?>"></td>
						</tr>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="user" value="<?php echo $nv["username"] ?>"></td>
						</tr>
						<tr>
							<td>CMND:</td>
							<td><input type="text" name="cmnd" value="<?php echo $nv["password"] ?>"></td>
						</tr>
						<tr>
							<td>Điện thoại:</td>
							<td><input type="text" name="phone" value="<?php echo $nv["dien_thoai"] ?>"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" value="<?php echo $nv["email"] ?>"></td>
						</tr>
						<tr>
							<td>Chức năng:</td>
							<td>
								<input type="radio" name="chuc_nang" value="1" <?php if($nv['chuc_nang'] == "1") { echo "checked"; } ?>>Admin
								&nbsp;&nbsp;
								<input type="radio" name="chuc_nang" value="0" <?php if($nv['chuc_nang'] == "0") { echo "checked"; } ?>>Nhân viên
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