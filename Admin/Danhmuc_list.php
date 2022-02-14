<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh mục sản phẩm Baby Store</title>
	<?php include("../include/icon.php") ?>
	<link rel="stylesheet" type="text/css" href="../css/danh_muc.css">
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>
		<?php
			if(isset($_GET["ID"])){
			        $ROLE=$_GET["ID"];
			}
			include("../include/open_sql.php");

			$sql = "SELECT * FROM danh_muc";

			$result = mysqli_query($con, $sql);

			include("../include/close_sql.php");
		?>

		<div id="danh_sach_nhan_vien">
			<?php include("../include/logout_bar.php"); ?>
	    	<div id="banner">
	    		<h1>DANH MỤC SẢN PHẨM BABY STORE</h1>
	    	</div>

	    	<div id="bang">
	    		
	    		<table border="1px" cellspacing="0" cellpadding="10px">
	    			<tr>
	    				<th>STT</th>
	      				<th>Tên danh mục</th>
	      				<th>Mô tả</th>
	    			</tr>
	    			<?php while ($dm = mysqli_fetch_array($result)) { ?>
	    			<tr>
	    				<td><?php echo $dm["ma_dm"]; ?></td>
	    				<td><?php echo $dm["ten_dm"]; ?></td>
	    				<td><?php echo $dm["mo_ta"]; ?></td>
	    			</tr>
	    			    
	    			<?php } ?>
	    		</table>
	    	</div>
        </div>
	</div>
</body>
</html>