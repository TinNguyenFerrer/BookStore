<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include('Connect.php');    
$username = addslashes($_POST['Ten_dang_nhap']);
$password = addslashes($_POST['Pass']);
$password = md5($password);
if (!$username || !$password) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
//Kiểm tra tên đăng nhập 
$query = mysqli_query($conn,"SELECT HoTenKH, MatKhau FROM khachhang WHERE HoTenKH='$username'");
if (mysqli_num_rows($query) == 0) {
    echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
$mk = mysqli_fetch_array($query);
//So sánh 2 mật khẩu
if ($password != $mk['MatKhau']) {
    echo "Mật khẩu không đúng.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
    
//Lưu tên đăng nhập
$_SESSION['username'] = $username;
header("Location: index.php");
die();
?>