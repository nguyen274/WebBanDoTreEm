<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách nhà phân phối</title>
	<link rel="stylesheet" type="text/css" href="../css/npp.css">
	<?php include("../include/icon.php"); ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="danh_sach_npp">
			<?php include("../include/logout_bar.php") ?>
	    	<div id="banner">
	    		<h1>DANH SÁCH NHÀ PHÂN PHỐI BABY STORE</h1>
	    	</div>

	    	<div id="them">
	    		<h3><a href="Phanphoi_add.php">Thêm nhà phân phối</a></h3>
	    	</div>

	    	<div id="tim_kiem">
	    	       <form method="post" action="Phanphoi_list.php.php">
	    			<input type="text" name="search" placeholder="Nhập tên nhà phân phối..." size="60">
	    			<button>Tìm</button>
	    		</form>
	    	</div>

	    	<div id="bang">
	    		<?php
	    		
					include("../include/open_sql.php");
					$sql = "SELECT * FROM nha_pp";
					if (isset($_POST["search"])) {
					        $search = $_POST["search"];

					        $sql_search = "SELECT * FROM nha_pp WHERE ten_npp LIKE '%$search%'";
					        $result = mysqli_query($con, $sql_search);
					} else {
					        $result = mysqli_query($con, $sql);
					}
					include("../include/close_sql.php");
				?>
	    		<table border="1px" cellspacing="0" cellpadding="10px" width="100%">
	    			<tr>
	    				<th>STT (ID)</th>
	      				<th>Tên NPP</th>
	      				<th>Địa chỉ</th>
	      				<th>Email</th>
	      				<th>Điện thoại</th>
	      				<th>Thao tác</th>
	    			</tr>
	    			<?php while ($npp = mysqli_fetch_array($result)) { ?>
	    			<tr>
	    				<td><?php echo $npp["ma_npp"]; ?></td>
	    				<td><?php echo $npp["ten_npp"]; ?></td>
	    				<td><?php echo $npp["dia_chi"]; ?></td>
	    				<td><?php echo $npp["email"]; ?></td>
	    				<td><?php echo $npp["dien_thoai"] ?></td>
	    				<td>
	    					<a href="Phanphoi_fix.php?id=<?php echo $npp["ma_npp"]; ?>">Sửa</a>
	    				</td>
	    			</tr>
	    			<?php } ?>
	    		</table>
	    	</div>
		</div>
	</div>
</body>
</html>