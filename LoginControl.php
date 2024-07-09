<?php
    session_start();   
$name=$_REQUEST["namedn"];
$pass=$_REQUEST["passdn"];
$conn=mysqli_connect("localhost","ngoc","@Ngoc1206") or die("disconnect");
	mysqli_select_db($conn,"qlchitieu")or die("not found");
$sql="Select * from user ";
	$result_name=mysqli_query($conn,$sql);
$row=mysqli_fetch_object($result_name);
$id_user=$row->id_tk;
$namedn=$row->name;
$passdn=$row->pass;
	 $_SESSION['id_tk'] = $id_user;
if($name==$namedn&&$pass==$passdn){
	header("Location:TrangChuLogin.php");
}
else{
	header("Location:LoginView.php");
}
						 
	?>