<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

include '../include/open_sql.php';

$sql = "SELECT * from khach_hang WHERE username = '$username' and password = '$password'"; 

$result = mysqli_query($con, $sql);
$u = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if($count==0){ 
	header("location:../login.php?error=1");  
}
else{
	if ($u["trang_thai"]=="1") {
		$_SESSION["username"] = $username;
		header("location:../index.php");
	}
	if ($u["trang_thai"]=="0") {
		header("location:../login.php?de=1");
	}
}
include("../include/close_sql.php");

?>