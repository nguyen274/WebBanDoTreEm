<?php 
	if (isset($_GET["id"])) {
		$id = $_GET["id"];

		include("../include/open_sql.php");

		$sql = "UPDATE hoa_don SET trang_thai = 'cancelled' WHERE ma_hd = '$id'";

		mysqli_query($con, $sql);

		// Cập nhật lại số lượng của bảng sản phẩm
		// Lấy tất cả sản phẩm từ bảng hóa đơn chi tiết thông qua mã hóa đơn
		$sqlHoaDonChiTiet = "SELECT * FROM `hoa_don_chi_tiet` WHERE ma_hd=$id";
		$resultHoaDonChiTiet = mysqli_query($con, $sqlHoaDonChiTiet);
		while ($hoaDonChiTiet = mysqli_fetch_array($resultHoaDonChiTiet)) {
			// Lấy số lượng đã đặt
			$soLuongHoaDon = $hoaDonChiTiet["so_luong"];
			// Lấy mã sản phẩm
			$maSanPham = $hoaDonChiTiet["san_pham"];

			$sqlSanPham = "SELECT * FROM san_pham WHERE ma_sp=$maSanPham";
			$resultSanPham = mysqli_query($con, $sqlSanPham);
			$sanPham = mysqli_fetch_array($resultSanPham);
			$soLuongBanDau = $sanPham["soLuong"];

			// Số lượng update = số lượng sản phẩm + số lượng đã đặt
			$soLuongHienTai = $soLuongBanDau + $soLuongHoaDon;

			// Update Sản phẩm
			$sqlUpdateSanPham = "UPDATE san_pham SET so_luong = $soLuongHienTai WHERE ma_sp=$maSanPham";
			mysqli_query($con, $sqlUpdateSanPham);
		}
		include("../include/close_sql.php");

		header("Location: ../Admin/Hoadon_list.php?search=waiting");
	} else {
		header("Location: ../Admin/Hoadon_list.php");
		}
?>