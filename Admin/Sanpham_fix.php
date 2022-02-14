<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<?php
	$ma = -1;
	if (isset($_GET["id"])) {
		$ma = $_GET["id"];
	}

	include("../include/open_sql.php");
	$sql = "SELECT * FROM san_pham WHERE ma_sp = '$ma'";

	$result = mysqli_query($con, $sql);

	$sp = mysqli_fetch_array($result);

	include("../include/close_sql.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin sản phẩm</title>
	<link rel="stylesheet" href="../css/Sua_npp.css">
	<?php include("../include/icon.php") ?>
	<script type="text/javascript" src="../CKEditor & CKFinder/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../CKEditor & CKFinder/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../CKEditor & CKFinder/ckfinder/ckfinder.js"></script>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="sua_npp">
			<?php include("../include/logout_bar.php") ?>
			<form method="post" action="../process/sua_sp_process.php" enctype="multipart/form-data">
				<div id="banner">
					<h1>SỬA THÔNG TIN SẢN PHẨM</h1>
				</div>

				<hr>

				<table cellpadding="5px" cellspacing="0">
					<tr>
						<td colspan="2">
							<input type="hidden" name="id" value="<?php echo $ma;?>">
						</td>
					</tr>
					<tr>
						<td>Tên sản phẩm:</td>
						<td><input type="text" required="" name="ten" value="<?php echo $sp["ten_sp"] ?>"></td>
					</tr>
					<tr>
						<td>Mã danh mục:</td>
						<td><input type="number" required="" name="dm" value="<?php echo $sp["ma_dm"] ?>"></td>
					</tr>
					<tr>
						<td>Giá tiền (VND):</td>
						<td><input type="number" required="" name="cost" value="<?php echo $sp["gia_tien"] ?>"></td>
					</tr>
					<tr>
						<td>Ảnh:</td>
						<td><input type="file" name="anh" required=""></td>
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

			<script type="text/javascript">
				CKEDITOR.replace("mota" , {
					filebrowserBrowseUrl: "../CKEditor & CKFinder/ckfinder/ckfinder.html",
					filebrowserImageBrowseUrl: "../CKEditor & CKFinder/ckfinder/ckfinder.html?type=Images",
					filebrowserFlashBrowseUrl: "../CKEditor & CKFinder/ckfinder/ckfinder.html?type=Flash",
					filebrowserUpLoadUrl: "../CKEditor & CKFinder/ckfinder/core/connector/php/connector.php?command=QuickUpLoad&type=Files",
					filebrowserImageUpLoadUrl: "../CKEditor & CKFinder/ckfinder/core/connector/php/connector.php?command=QuickUpLoad&type=Images",
					filebrowserFlashUpLoadUrl: "../CKEditor & CKFinder/ckfinder/core/connector/php/connector.php?command=QuickUpLoad&type=Flash",
				});
			</script>
		</div>
	</div>
</body>
</html>