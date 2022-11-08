<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = "databasebansach";
error_reporting(E_ALL ^ E_WARNING);
$conn = mysqli_connect($hostname, $username, $password,$dbname);

if (!$conn) {
 die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
?>