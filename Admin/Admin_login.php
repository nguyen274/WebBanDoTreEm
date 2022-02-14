<?php 
	if (isset($_SESSION["admin"]) || isset($_SESSION["nv"])) {
		header("location: Admin_homepage.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Baby Store - Nhân viên</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_login.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/user_side_bar.php") ?>

		<div id="dang_nhap">
			<form method="post" action="../process/admin_login_process.php">
				<table>
					<tr>
						<td colspan="2">
							<h2>ĐĂNG NHẬP CHO NHÂN VIÊN</h2>
						</td>
					</tr>
					<tr>
						<td width="30%">Tên đăng nhập:</td>
						<td width="70%"><input type="text" name="username" required=""></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td width="30%">Mật khẩu:</td>
						<td width="70%"><input type="password" name="password" required=""></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php if(isset($_GET["error"])){
								echo "Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại.";
							} ?>
							<br>
							<button>Đăng nhập</button>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<?php include("../include/infor.php") ?>

		<?php include("../include/move.php") ?>
	</div>
</body>
</html>