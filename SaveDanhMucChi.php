<?php
include("connectdb.php");
 $add=$_REQUEST['addloai'];
$sql="INSERT INTO danhmuc (id_type,name,kieu) VALUES (NULL,'$add','Chi')";
mysqli_query($conn, $sql);
header("Location: AddChiTieu.php");
?>