<?php
session_start();
if (isset($_SESSION["username"])) {
	header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Baby Store - Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="css/Login.css">
	<?php include("include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("include/user_side_bar.php") ?>

		<div id="dang_nhap">
			<div id="banner">
				<h1>Đăng nhập</h1>
				<h3><a href="../PJ1/index.php">Trang chủ</a> &gt; Tài khoản</h3>
				<img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-blue-minimalistic-mother-and-baby-banner-poster-background-image_176803.jpg" width="100%" height="100%">
			</div>

			<div id="form">
				<form method="post" action="process/login_process.php">
					<table border="0">
						<tr>
							<td colspan="2">
								<?php if (isset($_GET["success"])) {
									echo "Đăng kí thành công.";
								} ?>
							</td>
						</tr>
						<tr>
							<td width="30%">Tên đăng nhập:</td>
							<td width="70%"><input type="text" name="username"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td width="30%">Mật khẩu:</td>
							<td width="70%"><input type="password" name="password"></td>
						</tr>
						<tr>
							<td colspan="2">
								<?php if (isset($_GET["error"])) { echo "Sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại."; } ?>
								<?php if (isset($_GET["de"])) { echo "Có vẻ như tài khoạn bạn đang cố truy cập đã bị khóa."; } ?>
								<br>
								<button>Đăng nhập</button>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Chưa có tài khoản? <a href="Sign_in.php" class="other">Đăng ký ngay</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>

		<?php include("include/infor.php") ?>

		<?php include("include/move.php") ?>
	</div>
</body>
</html>