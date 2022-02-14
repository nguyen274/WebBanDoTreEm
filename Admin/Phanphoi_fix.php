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
	$sql = "SELECT * FROM nha_pp WHERE ma_npp = '$ma'";

	$result = mysqli_query($con, $sql);

	$npp = mysqli_fetch_array($result);

	include("../include/close_sql.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin nhà phân phối</title>
	<link rel="stylesheet" href="../css/Sua_npp.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="sua_npp">
			<?php include("../include/logout_bar.php") ?>
			<form method="post" action="../process/sua_npp_process.php">
				<div id="banner">
					<h1>SỬA THÔNG TIN NHÀ PHÂN PHỐI</h1>
				</div>

				<hr>

				<table cellpadding="5px" cellspacing="0">
					<tr>
						<td colspan="2">
							<input type="hidden" name="id" value="<?php echo $ma;?>">
						</td>
					</tr>
					<tr>
						<td>Tên nhà phân phối:</td>
						<td><input type="text" name="ten" value="<?php echo $npp["ten_npp"] ?>"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value="<?php echo $npp["email"] ?>"></td>
					</tr>
					<tr>
						<td>Điện thoại:</td>
						<td><input type="text" name="phone" value="<?php echo $npp["dien_thoai"] ?>"></td>
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