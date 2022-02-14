<style type="text/css">
	#category{
	    text-align: center;
	    width: 100%;
	    font-family: segoe ui light;
	}
	li{
	    list-style-type: none;
	    font-size: 21px;
	    font-weight: bold;
	    display: block;
	    line-height: 45px;
	}
	li a{
	    text-decoration: none;
	    color: black;
	    display: block;
	}
	a:hover{
		color: #C223AD;
		transition-duration: 0.7s;
	}
</style>
<div>
	<ul>
		<?php 
			if (isset($_SESSION["admin"])) { ?>
				<li><a href="../Admin/Hoadon_list.php">DANH SÁCH HÓA ĐƠN</a></li>
				<li><a href="../Admin/Phanphoi_list.php">NHÀ PHÂN PHỐI</a></li>
				<li><a href="../Admin/Sanpham_list.php">SẢN PHẨM</a></li>
				<li><a href="../Admin/Khachhang_list.php">KHÁCH HÀNG</a></li>
				<li><a href="../Admin/Nhanvien_list.php">NHÂN VIÊN</a></li>
				<li><a href="../Admin/Danhmuc_list.php">DANH MỤC SẢN PHẨM</a></li>
			<?php }
			if (isset($_SESSION["nv"])) { ?>
				<li><a href="../Admin/Hoadon_list.php">DANH SÁCH HÓA ĐƠN</a></li>
				<li><a href="../Admin/Sanpham_list.php">SẢN PHẨM</a></li>
				<li><a href="../Admin/Khachhang_list.php">KHÁCH HÀNG</a></li>
				<li><a href="../Admin/Danhmuc_list.php">DANH MỤC SẢN PHẨM</a></li>
				<li><a href="../Admin/Phanphoi_list.php">NHÀ PHÂN PHỐI</a></li>
			<?php } ?>
	</ul>
</div>