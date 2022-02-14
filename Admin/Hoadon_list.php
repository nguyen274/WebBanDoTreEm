<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách hóa đơn</title>
	<?php include("../include/icon.php") ?>
	<link rel="stylesheet" type="text/css" href="../css/hoadon_list.css">
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>
		<?php
			if(isset($_GET["ID"])){
			        $ROLE=$_GET["ID"];
			}
			include("../include/open_sql.php");
			$sql = "SELECT hoa_don.ma_hd, khach_hang.ten_kh, hoa_don.dia_chi, hoa_don.ngay_mua, hoa_don.trang_thai FROM hoa_don JOIN khach_hang ON hoa_don.ma_kh = khach_hang.ma_kh WHERE ma_hd = 0";

			if (isset($_GET["search"])) {
		        $search = $_GET["search"];
		    	$sql_search = "SELECT hoa_don.ma_hd, khach_hang.ten_kh, hoa_don.dia_chi, hoa_don.ngay_mua, hoa_don.trang_thai FROM hoa_don JOIN khach_hang ON hoa_don.ma_kh = khach_hang.ma_kh WHERE hoa_don.trang_thai ='$search'";
		        $result = mysqli_query($con, $sql_search);  
			}else{
				$result = mysqli_query($con, $sql);
			}
			include("../include/close_sql.php");
		?>
		<div id="danh_sach_sp">
			<?php include("../include/logout_bar.php"); ?>

	    	<div id="banner">
	    		<h1>DANH SÁCH HÓA ĐƠN</h1>
	    	</div>

	    	<div id="search">
	    		<form>
					<select name="search">
						<option selected="" disabled="">---Chọn loại hóa đơn---</option>
						<option value="approved">Đã duyệt</option>
						<option value="waiting">Đang chờ</option>
						<option value="cancelled">Đã hủy</option>
					</select>
					<button>Tìm</button>
				</form>
	    	</div>
	    	<table border="1px" cellspacing="0">
				<tr>
					<th>Mã HD</th>
					<th>Tên khách hàng</th>
					<th>Địa chỉ</th>
					<th>Ngày mua</th>
					<th>Trạng thái</th>
					<th>Thao tác</th>
				</tr>
				<?php
				if($result != null){
				 while ($hd = mysqli_fetch_array($result)) { ?>
				
				<tr>
					<td><?php echo $hd["ma_hd"]; ?></td>
					<td><?php echo $hd["ten_kh"]; ?></td>
					<td><?php echo $hd["dia_chi"]; ?></td>
					<td><?php echo $hd["ngay_mua"]; ?></td>
					<td><?php echo $hd["trang_thai"]; ?></td>
					<?php
				        if ($hd["trang_thai"] == "waiting") {
				        ?>
					<td>
						<a href="../process/duyet_hd_process.php?id=<?php echo $hd["ma_hd"]; ?>">Duyệt</a>
						&nbsp;&nbsp;
						<a href="../process/huy_hd_process.php?id=<?php echo $hd["ma_hd"] ?>">Hủy</a>
					</td>
				<?php } else { ?>
					<td></td>
				<?php } ?>
				</tr>
			    
				<?php }} ?>
				
			</table>
        </div>
	</div>
</body>
</html>