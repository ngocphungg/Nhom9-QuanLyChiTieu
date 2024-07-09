<?php
	$conn=mysqli_connect("localhost","root","") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
	// Lấy dữ liệu từ biểu mẫu
$amount =$_REQUEST['amount'];
$acc=$_REQUEST['kieuvi'];
	$type=$_REQUEST['loai'];
	$note=$_REQUEST['note'];
	$date=$_REQUEST['transactionDate'];
// Chuẩn bị câu lệnh SQL
	$sql = "INSERT INTO giaodich (id_gd, id_type, amount, date, note, id_acc,kieu) VALUES (NULL, '$type', '$amount', '$date', '$note', '$acc','Thu')";
	$capnhatthu="UPDATE list_accounts SET thu = ( SELECT SUM(amount) FROM giaodich WHERE kieu='Thu' AND list_accounts.id_acc=giaodich.id_acc)";
	$capnhatvi="UPDATE list_accounts
SET money_acc = money_acc + (SELECT SUM(thu) FROM list_accounts) WHERE id_acc='$acc'";

// Thực thi câu lệnh SQL
mysqli_query($conn, $sql);
mysqli_query($conn, $capnhatthu);
mysqli_query($conn, $capnhatvi);
header("Location: AddThuNhap.php");
	?>