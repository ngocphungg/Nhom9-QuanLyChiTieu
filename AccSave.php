<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$name=$_REQUEST["txt_name"];
	$email=$_REQUEST["txt_email"];
	$pass=$_REQUEST["passw"];
	
	$conn=mysqli_connect("localhost","ngoc","@Ngoc1206") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
	$sql_savehsx="INSERT INTO `user` (`id_tk`,`email`,`name`,`pass`) VALUES (NULL, '$email','$name','$pass')";
	mysqli_query($conn, $sql_savehsx);
	header("Location:LoginView.php");
	?>
</body>
</html>