<?php
    if (isset($_POST["ho_ten"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["cmnd"])
    && isset($_POST["dia_chi"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["chuc_nang"])) {
        $ho_ten = $_POST["ho_ten"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $cmnd = $_POST["cmnd"];
        $dia_chi = $_POST["dia_chi"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $chuc_nang = $_POST["chuc_nang"];
    }
    include("../include/open_sql.php");
    
    $sql = "INSERT INTO nhan_vien(ten_nv, username, password, cmnd, dia_chi, dien_thoai, email, chuc_nang) 
            VALUES ('$ho_ten', '$user', '$pass', '$cmnd', '$dia_chi', '$phone', '$email', '$chuc_nang')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Nhanvien_add.php?error=1");
    }
    else {
        header("Location: ../Admin/Nhanvien_list.php");
    }

    include("../include/close_sql.php");
?>