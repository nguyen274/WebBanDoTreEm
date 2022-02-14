<?php
    if (isset($_POST["id"]) && isset($_POST["ho_ten"]) && isset($_POST["user"]) && isset($_POST["cmnd"]) && isset($_POST["phone"]) 
        && isset($_POST["email"]) && isset($_POST["chuc_nang"])) {
        $ho_ten = $_POST["ho_ten"];
        $user = $_POST["user"];
        $cmnd = $_POST["cmnd"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $chuc_nang = $_POST["chuc_nang"];

        $id = $_POST["id"];
    }

    include("../include/open_sql.php");

    $sql = "UPDATE nhan_vien SET ten_nv ='$ho_ten', username = '$user', cmnd = '$cmnd', email = '$email', 
            dien_thoai = '$phone', chuc_nang = '$chuc_nang' WHERE ma_nv = '$id'";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Nhanvien_fix.php?error=1");
    } else {
        header("Location: ../Admin/Nhanvien_list.php");
    }

    include("../include/close_sql.php");
?>
