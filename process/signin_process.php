<?php
if (isset($_POST["ho_ten"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["dien_thoai"])
    && isset($_POST["dob"]) && isset($_POST["email"]) && isset($_POST["dia_chi"])) {
    $ten = $_POST["ho_ten"];
$user = $_POST["username"];
$pass = $_POST["password"];
$phone = $_POST["dien_thoai"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$dia_chi = $_POST["dia_chi"];
}
include("../include/open_sql.php");

$sql = "INSERT INTO khach_hang(ten_kh, dien_thoai, ngay_sinh, email, dia_chi, username, password)
VALUES ('$ten', '$phone', '$dob', '$email', '$dia_chi', '$user', '$pass')";
$run = mysqli_query($con, $sql);

if (!$sql) {
    header("location: sign_in.php?error=1");
}
else {
    header("location: ../login.php?success=1");
}

include("../include/close_sql.php");
?>