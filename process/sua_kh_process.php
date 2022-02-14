<?php
    if (isset($_POST["id"]) && isset($_POST["ten"]) && isset($_POST["user"]) && isset($_POST["phone"]) 
        && isset($_POST["dob"]) && isset($_POST["email"]) && isset($_POST["trang_thai"])) {
        $ten = $_POST["ten"];
        $user = $_POST["user"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $trang_thai = $_POST["trang_thai"];

        $id = $_POST["id"];
    }

    include("../include/open_sql.php");

    $sql = "UPDATE khach_hang SET ten_kh ='$ten', username = '$user', email = '$email', ngay_sinh ='$dob', 
            dien_thoai = '$phone', trang_thai = '$trang_thai' WHERE ma_kh = '$id'";
            // echo $sql; exit;
    
    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Khachhang_fix.php?error=1");
    } else {
        header("Location: ../Admin/Khachhang_list.php");
    }

    include("../include/close_sql.php");
?>