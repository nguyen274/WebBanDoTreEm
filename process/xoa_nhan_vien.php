<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];

  include("../include/open_sql.php");

  $sql = "DELETE FROM nhan_vien WHERE ma_nv = '$id'";

  mysqli_query($con, $sql);

  include("../include/close_sql.php");

  header("Location: ../Admin/Nhanvien_list.php");
} else {
  header("Location: ../Admin/Nhanvien_list.php");
}
?>