<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['gio_hang']);

header("location:index.php"); 