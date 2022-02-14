<?php 
$connect = new mysqli('localhost', 'root', '', 'store');
// var_dump($connect);
 $ID = 15;
 $sql = "SELECT ma_sp, ten_sp FROM san_pham limit 2";
 $stmt = $connect->prepare($sql);
 $stmt->execute();
 $result = $stmt->get_result();
 //var_dump($result->fetch_all(MYSQLI_ASSOC));
 $kq = $result->fetch_all(MYSQLI_ASSOC);

echo (json_encode($kq));
