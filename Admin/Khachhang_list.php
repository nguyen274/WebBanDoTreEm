<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách khách hàng Baby Store</title>
	<link rel="stylesheet" type="text/css" href="../css/khach_hang.css">
	<?php  include("../include/icon.php") ?>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="danh_sach_kh">
	    	<div id="banner">
	    		<h1>DANH SÁCH KHÁCH HÀNG BABY STORE</h1>
	    	</div>
	    	<div id="tim_kiem">
	    	       <form method="post" action="Khachhang_list.php">
	    			<input type="text" name="search" placeholder="Nhập tên khách hàng..." size="60">
	    			<button>Tìm</button>
	    		</form>
	    	</div>

	    	<div id="bang">
	    		<?php
	    		
					include("../include/open_sql.php");
					$sql = "SELECT * FROM khach_hang";
					if (isset($_POST["search"])) {
					        $search = $_POST["search"];

					        $sql_search = "SELECT * FROM khach_hang WHERE ten_kh LIKE '%$search%'";
					        $result = mysqli_query($con, $sql_search);
					} else {
					        $result = mysqli_query($con, $sql);
					}
					include("../include/close_sql.php");
				?>
	    		<table border="1px" cellspacing="0" cellpadding="10px" width="100%">
	    			<tr>
	    				<th>STT (ID)</th>
	      				<th>Username</th>
	      				<th>Password</th>
	      				<th>Tên khách hàng</th>
	      				<th>Điện thoại</th>
	      				<th>Ngày sinh</th>
	      				<th>Email</th>
	      				<th>Địa chỉ</th>
	      				<th>Trạng thái</th>
	      				<th>Thao tác</th>
	    			</tr>
	    			<?php while ($kh = mysqli_fetch_array($result)) { ?>
	    			<tr>
	    				<td><?php echo $kh["ma_kh"]; ?></td>
	    				<td><?php echo $kh["username"]; ?></td>
	    				<td><?php echo $kh["password"]; ?></td>
	    				<td><?php echo $kh["ten_kh"]; ?></td>
	    				<td><?php echo $kh["dien_thoai"] ?></td>
	    				<td><?php echo $kh["ngay_sinh"]; ?></td>
	    				<td><?php echo $kh["email"]; ?></td>
	    				<td><?php echo $kh["dia_chi"]; ?></td>
	    				<td><?php echo $kh["trang_thai"]; ?></td>
	    				<td>
	    					<a href="Khachhang_fix.php?id=<?php echo $kh["ma_kh"]; ?>">Sửa</a>&nbsp;&nbsp;||&nbsp;&nbsp;
	    					<a href="../process/xoa_kh.php?id=<?php echo $kh["ma_kh"] ?>" onclick="return confirm('Bạn có chắc chắn muốn gỡ? Thao tác này không thể hoàn tác.')">Gỡ</a>
	    				</td>
	    			</tr>
	    			<?php } ?>
	    		</table>
	    	</div>
	    	<?php include("../include/logout_bar.php") ?>
		</div>
	</div>
</body>
</html>