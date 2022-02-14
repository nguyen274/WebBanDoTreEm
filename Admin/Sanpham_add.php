<?php
	session_start();
	if (!isset($_SESSION["admin"]) && !isset($_SESSION["nv"])) {
		header("location: Admin_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
	<?php include("../include/icon.php") ?>
	<link rel="stylesheet" type="text/css" href="../css/sanpham_add.css">
	<script type="text/javascript" src="../CKEditor & CKFinder/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../CKEditor & CKFinder/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../CKEditor & CKFinder/ckfinder/ckfinder.js"></script>
</head>
<body>
	<div id="tong">
		<?php include("../include/admin_side_bar.php") ?>

		<div id="them_sp">
			<?php include("../include/logout_bar.php") ?>

			<form method="post" action="../process/sp_add_process.php" enctype="multipart/form-data">
				<div id="banner">
					<h1>THÊM SẢN PHẨM BÁN HÀNG</h1>
				</div>

				<hr>

				<table cellpadding="5px" cellspacing="0">
					<tr>
						<td colspan="2">
							<?php if (isset($_GET["error"])) { echo "Thêm sản phẩm thất bại. Thử lại."; }?>
						</td>
					</tr>
					<tr>
						<td>Tên sản phẩm:</td>
						<td><input type="text" name="ten" required=""></td>
					</tr>
					<tr>
						<td>Danh mục:</td>
						<td>
							<input type="radio" name="dm" required="" value="1">Đồ ăn
							<input type="radio" name="dm" required="" value="2">Quần áo
							<input type="radio" name="dm" required="" value="3">Đồ đi chơi
							<input type="radio" name="dm" required="" value="4">Đồ ngủ
							<br>
							<input type="radio" name="dm" required="" value="5">Vệ sinh
							<input type="radio" name="dm" required="" value="6">Chăm sóc sức khỏe
							<input type="radio" name="dm" required="" value="7">Đồ chơi
						</td>
					</tr>
					<tr>
						<td>Giá tiền:</td>
						<td><input type="number" name="cost" required=""></td>
					</tr>
					<tr>
						<td>Nhà phân phối (mã):</td>
						<td><input type="number" name="npp" required=""></td>
					</tr>
					<tr>
						<td>Mô tả:</td>
						<td>
							<textarea name="mota" id="mota" required=""></textarea>
						</td>
					</tr>
					<tr>
						<td>Ảnh đại diện sản phẩm:</td>
						<td><input type="file" name="anh" required=""></td>
					</tr>
					<tr>
						<td colspan="2">
							<br>
							<br>

							<button>Thêm sản phẩm</button>
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