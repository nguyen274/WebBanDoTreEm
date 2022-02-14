<?php
    if (isset($_POST["ten_npp"]) && isset($_POST["dia_chi"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
        $ten = $_POST["ten_npp"];
        $dia_chi = $_POST["dia_chi"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
    }
    include("../include/open_sql.php");
    
    $sql = "INSERT INTO nha_pp(ten_npp, dia_chi, email, dien_thoai) 
            VALUES ('$ten', '$dia_chi', '$email', '$phone')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Phanphoi_add.php?error=1");
    }
    else {
        header("Location: ../Admin/Phanphoi_list.php");
    }

    include("../include/close_sql.php");
?>