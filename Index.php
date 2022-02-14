<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Baby Store - Shop dành cho trẻ em</title>
	<link rel="stylesheet" type="text/css" href="css/BS.css">
	<?php include("include/icon.php") ?>
	<style>
		hr {
			border-top: 1px dashed red;
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
			<hr>
			<h1 id="slogan">MANG LẠI CHĂM SÓC TỐT NHẤT CHO TRẺ.</h1>
			<img src="https://makemefeel.co.uk/wp-content/uploads/2019/03/4B9135153-tdy-130924-baby-scent.jpg" width="100%" height="100%">
		</div>
		<div id="right_content_2">
			<h1 id="join_us">THAM GIA CÙNG CHÚNG TÔI</h1>
			<h4 id="enter_form"><a href="Tuyendung.php">TẠI ĐÂY</a></h4>
			<img src="https://wordpress-network.prod.aws.skyscnr.com/wp-content/uploads/2018/05/primary-31.jpg" width="100%" height="100%">
		</div>

		<?php include ("include/infor.php") ?>

		<?php include("include/move.php") ?>
	</div>
</body>
</html>