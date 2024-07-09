<?php
include("connectdb.php");
 $add=$_REQUEST['addvi'];
$money=$_REQUEST['money'];
$sql="INSERT INTO list_accounts (id_acc, name_acc,money_acc,thu,chi) VALUES (NULL,'$add','$money','0','0')";
mysqli_query($conn, $sql);
header("Location: AddChiTieu.php");
?>