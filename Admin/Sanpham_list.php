<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách sản phẩm Baby Store</title>
	<?php include("../include/icon.php") ?>
	<link rel="stylesheet" type="text/css" href="../css/sanpham_list.css">
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>
		<!-- Tìm theo tên sản phẩm -->
		<?php
			if(isset($_GET["ID"])){
			        $ROLE=$_GET["ID"];
			}
			include("../include/open_sql.php");
			$sql = "SELECT * FROM san_pham WHERE ma_sp = '0'";

			if (isset($_GET["search_ten"])) {
		        $search = $_GET["search_ten"];
		    	$sql_search_name = "SELECT san_pham.ma_sp, san_pham.ten_sp, san_pham.gia_tien, nha_pp.ten_npp,san_pham.mo_ta,san_pham.image, danh_muc.ten_dm, nha_pp.ma_npp FROM san_pham JOIN danh_muc ON san_pham.ma_dm = danh_muc.ma_dm JOIN nha_pp ON san_pham.nha_pp = nha_pp.ma_npp WHERE san_pham.ten_sp LIKE '%$search%' OR danh_muc.ten_dm LIKE '%$search%'";
		        $result = mysqli_query($con, $sql_search_name);  
			}else{
				$result = mysqli_query($con, $sql);
			}
			include("../include/close_sql.php");
		?>
		<div id="danh_sach_sp">
			<?php include("../include/logout_bar.php"); ?>

	    	<div id="banner">
	    		<h1>DANH SÁCH SẢN PHẨM BABY STORE</h1>
	    	</div>

	    	<div id="search">
	    		<form>
					<input type="text" name="search_ten" placeholder="Nhập tên sản phẩm..." size="60">
					<button>Tìm</button>
				</form>
	    	</div>

	    	<div id="them">
	    		<h4><a href="Sanpham_add.php">Thêm sản phẩm</a></h4>
	    	</div>

	    	<table border="1px" cellspacing="0">
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Danh mục</th>
					<th>Giá (nghìn đồng)</th>
					<th>Nhà phân phối</th>
					<th>Mô tả</th>
					<th>Ảnh</th>
					<th>Thao tác</th>
				</tr>
				<?php
				if($result != null){
				 while ($sp = mysqli_fetch_array($result)) { ?>
				
				<tr>
					<td><?php echo $sp["ma_sp"]; ?></td>
					<td><?php echo $sp["ten_sp"]; ?></td>
					<td><?php echo $sp["ten_dm"]; ?></td>
					<td><?php echo $sp["gia_tien"]; ?></td>
					<td><?php echo $sp["ten_npp"]; ?></td>
					<td><?php echo $sp["mo_ta"]; ?></td>
					<td><?php echo $sp["image"]; ?></td>
					<td><a href="Sanpham_fix.php?id=<?php echo $sp["ma_sp"]; ?>">Sửa</a><br>
				        <a href="../process/xoa_san_pham.php?id=<?php echo $sp["ma_sp"] ?>" onclick="return confirm('Bạn có chắc chắn muốn gỡ sản phẩm này? Thao tác này không thể hoàn tác.')">Gỡ</a></td>
				</tr>
			    
				<?php }} ?>
				
			</table>
        </div>
	</div>
</body>
</html>