<?php
include 'include/open_sql.php';
session_start();
$name= $_SESSION["username"];
$sql1="SELECT * FROM `khach_hang` WHERE username ='$name'";
$run= mysqli_query($con, $sql1);
$tras=mysqli_fetch_array($run);
$id_pro=$tras["ma_kh"];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngay_mua = date("Y-m-d H:i:s");
$dia_chi_nhan_hang = $_GET["dia_chi_nhan_hang"];
$sqlThemHoaDon = "INSERT INTO hoa_don(ma_kh ,ngay_mua,dia_chi) 
VALUES ('$id_pro','$ngay_mua','$dia_chi_nhan_hang')";
mysqli_query($con, $sqlThemHoaDon);

$sql = "SELECT max(ma_hd) as ma_hd from hoa_don";
$result = mysqli_query($con,$sql);
$hd = mysqli_fetch_array($result);
$ma_hd = $hd['ma_hd'];
foreach ($_SESSION['gio_hang'] as $san_pham => $so_luong) {
	$sqlSanPham = "SELECT * FROM `san_pham` WHERE ma_sp=$san_pham";
    $resultSanPham = mysqli_query($con, $sqlSanPham);
    $sanPham = mysqli_fetch_array($resultSanPham);
    $gia_tien=$sanPham["gia_tien"];
	$sql = "insert into hoa_don_chi_tiet(ma_hd,gia_tien,san_pham,so_luong) 
	values ('$ma_hd','$gia_tien','$san_pham','$so_luong')";

	mysqli_query($con, $sql);
}
include 'include/close_sql.php';

header("location: hoadon_chitiet.php?id=$ma_hd");
?>