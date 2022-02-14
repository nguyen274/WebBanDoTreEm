<?php
    session_start();

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];
    }
    include("../include/open_sql.php");

    $sql = "SELECT * FROM nhan_vien WHERE username = '$user' AND password = '$pass'";

    $result = mysqli_query($con, $sql);

    $role = mysqli_fetch_array($result);
    
    $check = mysqli_num_rows($result);

    if ($check == 0) {
    	header("Location: ../Admin/admin_login.php?error=1");
    }

    if ($role["chuc_nang"]=="1") {
        $_SESSION["admin"] = $user;
        header("location: ../Admin/admin_homepage.php");
    }

    if ($role["chuc_nang"]=="0") {
        $_SESSION["nv"] = $user;
        header("location: ../Admin/admin_homepage.php");
    }
    include("../include/close_sql.php");
?>