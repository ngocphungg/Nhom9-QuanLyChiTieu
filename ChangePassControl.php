
<?php 
session_start();
include("connectdb.php");
if (isset($_SESSION['id_tk'])){
	$user= $_SESSION['id_tk'];
$newp=$_REQUEST['newpass'];
$sql = "UPDATE user SET pass = '$newp' WHERE id_tk = '$user'";
if ($conn->query($sql) === TRUE) {
    echo "Mật khẩu đã được thay đổi thành công";
	header("Location:TrangChuLogin.php");
} else {
    echo "Lỗi khi thay đổi mật khẩu: " . $conn->error;
}
}

?>