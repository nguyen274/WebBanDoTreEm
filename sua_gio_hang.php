<?php
session_start();
if (isset($_POST["gio_hang"])) {
	$gio_hang = $_POST["gio_hang"];
	foreach ($gio_hang as $ma_sp => $soLuong) {
		$_SESSION["gio_hang"][$ma_sp] = $soLuong;
	}

	header("Location: gio_hang.php");
}