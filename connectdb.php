<?php
const host = 'localhost';
const database = 'qlchitieu';
const user = 'ngoc';
const password = '@Ngoc1206';

$conn = new mysqli(host, user, password, database);
mysqli_set_charset($conn, 'utf8');
if(!$conn){
    die("Connect failed: " . mysqli_connect_error());
}

?>