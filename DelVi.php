<?php
	include("connectdb.php");
//Tạo câu truy vấn
$id_tk=$_REQUEST["id_acc"];
$sql_del="DELETE FROM list_accounts WHERE `list_accounts`.`id_acc` = $id_tk";
	mysqli_query($conn,$sql_del);
	header("Location: DanhsachVi.php");

?>