<?php
session_start();
if (isset($_SESSION["username"])) {
	$ma_sp = $_GET['ma_sp'];
	if (isset($_SESSION["gio_hang"][$ma_sp])) {
		$_SESSION["gio_hang"][$ma_sp]++;
	} else {
		$_SESSION["gio_hang"][$ma_sp] = 1;
	}
	header("Location: gio_hang.php");
}
