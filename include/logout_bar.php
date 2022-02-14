<style type="text/css">
	#bar{
		width: 100%;
		height: 10%;
		position: relative;
	}
	#hello{
		float: left;
		width: 30%;
		text-align: left;
		height: 50%;
		position: absolute;
		left: 50px;
	}
	#logout{
		float: right;
		width: 40%;
		text-align: right;
		position: absolute;
		right: 100px;
	}
</style>

<div id="bar">
	<div id="hello">
		<h3>Xin chào <?php if (isset($_SESSION["admin"])) { $user = $_SESSION["admin"]; echo "$user"; }
		if (isset($_SESSION["nv"])) { $user = $_SESSION["nv"]; echo "$user"; } ?></h3>
	</div>

	<div id="logout">
		<h3><a href="../process/logout.php">Đăng xuất</a></h3>
	</div>
</div>