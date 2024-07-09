<?php
	include("connectdb.php");
//Tạo câu truy vấn
$id_gd=$_REQUEST["id_gd"];
$sql_del="DELETE FROM giaodich WHERE `giaodich`.`id_gd` = $id_gd";
	mysqli_query($conn,$sql_del);
	header("Location: TrangChuLogin.php");

?>