<?php
    if (isset($_POST["id"]) && isset($_POST["ten"]) && isset($_POST["dm"]) && isset($_POST["cost"])
        && isset($_FILES["anh"])) {
        $ten = $_POST["ten"];
        $dm = $_POST["dm"];
        $cost = $_POST["cost"];
        $anh = $_FILES["anh"];

        $id = $_POST["id"];
        
        //B1: lấy tên ảnh
        $tenAnh = $anh["name"];
        //B2: Tạo đường dẫn ảnh đến thư mục upload
        $duongDan = "../ảnh sản phẩm/" . $tenAnh;
        //B3: Di chuyển ảnh từ file tạm thời đến file upload
        move_uploaded_file($anh["tmp_name"], $duongDan);
    }

    include("../include/open_sql.php");

    $sql = "UPDATE san_pham SET ten_sp ='$ten', ma_dm = '$dm', gia_tien = '$cost',
            image = '$tenAnh' WHERE ma_sp = '$id'";
    
    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Sanpham_fix.php?error=1");
    } else {
        header("Location: ../Admin/Sanpham_list.php");
    }

    include("../include/close_sql.php");
?>
 