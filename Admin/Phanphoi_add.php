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
	<title>Thêm nhà phân phối</title>
	<link rel="stylesheet" type="text/css" href="../css/Them_npp.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div>
		<div id="tong">
			<?php include("../include/admin_side_bar.php") ?>

			<div id="them_npp">
				<form method="post" action="../process/Them_npp_process.php">
					<?include("../include/logout_bar.php")?>
					<div id="banner">
						<h1>THÊM NHÀ PHÂN PHỐI</h1>
					</div>

					<hr>

					<table cellpadding="5px" cellspacing="0">
						<tr>
							<td colspan="2">
								<?php if (isset($_GET["error"])) { echo "Thêm thất bại. Thử lại."; } ?>
							</td>
						</tr>
						<tr>
							<td>Tên nhà phân phối:</td>
							<td><input type="text" name="ten_npp"></td>
						</tr>
						<tr>
							<td>Địa chỉ:</td>
							<td><textarea name="dia_chi"></textarea></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<td>Điện thoại:</td>
							<td><input type="text" name="phone"></td>
						</tr>
						<tr>
							<td colspan="2">
								<br>
								Lưu ý: Địa chỉ không thể thay đổi nếu nhập sai.
								<br>
								<br>

								<button>Thêm nhà phân phối</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>