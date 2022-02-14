<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản lý</title>
	<link rel="stylesheet" type="text/css" href="../css/Admin_homepage.css">
	<?php include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<?php include("../include/admin_right_content.php"); ?>
	</div>
</body>
</html>