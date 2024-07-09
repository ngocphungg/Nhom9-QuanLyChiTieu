<?php
	$conn=mysqli_connect("localhost","root","") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
	// Lấy dữ liệu từ biểu mẫu
$amount =$_REQUEST['Amount'];
$acc=$_REQUEST['kieuvi'];
	$type=$_REQUEST['loai'];
	$note=$_REQUEST['note'];
	$date=$_REQUEST['Date'];
// Chuẩn bị câu lệnh SQL
	$sql = "INSERT INTO giaodich (id_gd, id_type, amount, date, note, id_acc,kieu) VALUES (NULL, '$type', '$amount', '$date', '$note', '$acc','Chi')";
	$capnhatchi="UPDATE list_accounts SET chi = ( SELECT SUM(amount) FROM giaodich WHERE kieu='Chi' AND list_accounts.id_acc=giaodich.id_acc)";
	$capnhatvi="UPDATE list_accounts
SET money_acc = money_acc - (SELECT SUM(chi) FROM list_accounts) WHERE id_acc='$acc'";

// Thực thi câu lệnh SQL
mysqli_query($conn, $sql);
mysqli_query($conn, $capnhatchi);
mysqli_query($conn, $capnhatvi);
header("Location: AddChiTieu.php");
	?>