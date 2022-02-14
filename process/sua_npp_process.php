<?php
    if (isset($_POST["id"]) && isset($_POST["ten"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
        $ten = $_POST["ten"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $id = $_POST["id"];
    }

    include("../include/open_sql.php");

    $sql = "UPDATE nha_pp SET ten_npp ='$ten', email = '$email', dien_thoai = '$phone' WHERE ma_npp = '$id'";
    
    $result = mysqli_query($con, $sql);
    if (!$result) {
        header("Location: ../Admin/Phanphoi_fix.php?error=1");
    } else {
        header("Location: ../Admin/Phanphoi_list.php");
    }

    include("../include/close_sql.php");
?>
 