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
<!DOCTYPE html>
<html>
<head>
	<title>Thêm nhân viên</title>
	<link rel="stylesheet" type="text/css" href="../css/them_nhan_vien.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div>
		<div id="tong">
			<?php include("../include/admin_side_bar.php") ?>

			<div id="them_nhan_vien">
				<?php include("../include/logout_bar.php") ?>
				<form method="post" action="../process/Them_nhan_vien_process.php">
					<div id="banner">
						<h1>THÊM NHÂN VIÊN</h1>
					</div>

					<hr>

					<table cellpadding="5px" cellspacing="0">
						<tr>
							<td colspan="2">
								<?php if (isset($_GET["error"])) { echo "Thêm nhân viên thất bại. Thử lại với một username khác."; } ?>
							</td>
						</tr>
						<tr>
							<td>Tên nhân viên:</td>
							<td><input type="text" name="ho_ten" required=""></td>
						</tr>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="user" required=""></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="pass" required=""></td>
						</tr>
						<tr>
							<td>CMND:</td>
							<td><input type="text" name="cmnd" required=""></td>
						</tr>
						<tr>
							<td>Địa chỉ:</td>
							<td><textarea name="dia_chi" required=""></textarea></td>
						</tr>
						<tr>
							<td>Điện thoại:</td>
							<td><input type="text" name="phone" required=""></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" required=""></td>
						</tr>
						<tr>
							<td>Chức năng:</td>
							<td>
								<input type="radio" name="chuc_nang" value="1">Admin
								&nbsp;&nbsp;
								<input type="radio" name="chuc_nang" value="0">Nhân viên
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<br>
								Lưu ý: Địa chỉ không thể thay đổi nếu nhập sai.
								<br>
								<br>

								<button>Thêm nhân viên</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>