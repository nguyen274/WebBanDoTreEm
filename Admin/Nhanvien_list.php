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
	<title>Danh sách nhân viên Baby Store</title>
	<?php include("../include/icon.php") ?>
	<link rel="stylesheet" type="text/css" href="../css/danh_sach_nhan_vien.css">
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>
		<?php
			if(isset($_GET["ID"])){
			        $ROLE=$_GET["ID"];
			}
			include("../include/open_sql.php");
			$sql = "SELECT * FROM nhan_vien";
			if (isset($_POST["search"])) {
			        $search = $_POST["search"];

			        $sql_search = "SELECT * FROM nhan_vien WHERE ten_nv LIKE '%$search%'";
			        $result = mysqli_query($con, $sql_search);
			} else {
			        $result = mysqli_query($con, $sql);
			}
			include("../include/close_sql.php");
		?>

		<div id="danh_sach_nhan_vien">
			<?php include("../include/logout_bar.php"); ?>
	    	<div id="banner">
	    		<h1>DANH SÁCH NHÂN VIÊN BABY STORE</h1>
	    	</div>

	    	<div id="them">
	    		<h3><a href="Nhanvien_add.php">Thêm nhân viên</a></h3>
	    	</div>

	    	<div id="tim_kiem">
	    	       <form method="post" action="Nhanvien_list.php">
	    			<input type="text" name="search" placeholder="Nhập tên nhân viên..." size="60">
	    			<button>Tìm</button>
	    		</form>
	    	</div>

	    	<div id="bang">
	    		
	    		<table border="1px" cellspacing="0" cellpadding="10px">
	    			<tr>
	    				<th>Mã NV</th>
	      				<th>Tên NV</th>
	      				<th>Username</th>
	      				<th>Password</th>
	      				<th>CMND</th>
	      				<th>Địa chỉ</th>
	      				<th>Điện thoại</th>
	      				<th>Email</th>
	      				<th>Chức năng</th>
	      				<th>Thao tác</th>
	    			</tr>
	    			<?php while ($nv = mysqli_fetch_array($result)) { ?>
	    			<tr>
	    				<td><?php echo $nv["ma_nv"]; ?></td>
	    				<td><?php echo $nv["ten_nv"]; ?></td>
	    				<td><?php echo $nv["username"]; ?></td>
	    				<td><?php echo $nv["password"]; ?></td>
	    				<td><?php echo $nv["cmnd"]; ?></td>
	    				<td><?php echo $nv["dia_chi"]; ?></td>
	    				<td><?php echo $nv["dien_thoai"]; ?></td>
	    				<td><?php echo $nv["email"]; ?></td>
	                    <td><?php echo $nv["chuc_nang"]; ?></td>
	    				<td><a href="Nhanvien_fix.php?id=<?php echo $nv["ma_nv"]; ?>">Sửa</a></td>
	    			</tr>
	    			    
	    			<?php } ?>
	    		</table>
	    	</div>
        </div>
	</div>
</body>
</html>