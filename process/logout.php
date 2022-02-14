<?php 
session_start();
unset($_SESSION["admin"]);
unset($_SESSION["nv"]);
header("Location: ../admin/admin_login.php");
?>