<?php
session_start();
if (isset($_GET["ma_sp"])) {
	$ma_sp = $_GET["ma_sp"];
	unset($_SESSION["gio_hang"][$ma_sp]);
	header("Location: gio_hang.php");
}