<?php
    if (isset($_POST["ten"]) && isset($_POST["dm"]) && isset($_POST["cost"]) && isset($_POST["npp"])
    && isset($_POST["mota"]) && isset($_FILES["anh"])) {
        $ten = $_POST["ten"];
        $dm = $_POST["dm"];
        $cost = $_POST["cost"];
        $npp = $_POST["npp"];
        $mota = $_POST["mota"];

        $anh = $_FILES["anh"];

        //B1: lấy tên ảnh
        $tenAnh = $anh["name"];
        //B2: Tạo đường dẫn ảnh đến thư mục upload
        $duongDan = "../ảnh sản phẩm/" . $tenAnh;
        //B3: Di chuyển ảnh từ file tạm thời đến file upload
        move_uploaded_file($anh["tmp_name"], $duongDan);
    }
    include("../include/open_sql.php");
    
    $sql = "INSERT INTO san_pham(ten_sp, ma_dm, gia_tien, nha_pp, mo_ta, image) 
            VALUES ('$ten', '$dm', '$cost', '$npp', '$mota', '$tenAnh')";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        header("Location: ../Admin/Sanpham_add.php?error=1");
    }
    else {
        header("Location: ../Admin/Sanpham_list.php");
    }

    include("../include/close_sql.php");
?>