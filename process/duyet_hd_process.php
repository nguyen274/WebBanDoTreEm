<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include("../include/open_sql.php");

    $sql = "UPDATE hoa_don SET trang_thai = 'approved' WHERE ma_hd=$id";

    mysqli_query($con, $sql);

    include("../include/close_sql.php");

    header("Location: ../Admin/Hoadon_list.php?search=waiting");
} else {
    header("Location: ../Admin/Hoadon_list.php");
}