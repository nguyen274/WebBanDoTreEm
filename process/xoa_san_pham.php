<?php
if (isset($_GET["id"])) {
	$id = $_GET["id"];

	include("../include/open_sql.php");

	$sql = "DELETE FROM san_pham WHERE ma_sp = '$id'";

	mysqli_query($con, $sql);

	include("../include/close_sql.php");

  header("Location: ../Admin/Sanpham_list.php");
} else {
  header("Location: ../Admin/Sanpham_list.php");
}
?>