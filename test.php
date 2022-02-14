<?php 

 $connect = new mysqli('localhost', 'root', '', 'store');
// var_dump($connect);
 $ID = 15;
 $sql = "SELECT * FROM san_pham WHERE ma_sp = ?";
 $stmt = $connect->prepare($sql);
 $stmt->bind_param("i", $ID);
 $stmt->execute();
 $result = $stmt->get_result();
 var_dump($result->fetch_all(MYSQLI_ASSOC));
 ?>