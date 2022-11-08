<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    
    //duyet 
    if(!isset($_GET['id_NV'])){
        echo "Mã nhân viên Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    }
    $id=$_GET['id_NV'];
    $query_sql ="DELETE FROM nhanvien WHERE nhanvien.MSNV = $id;  ";
    $query_sql = mysqli_query($conn,$query_sql);
    if($query_sql){
    header("Location:QuanLy_NV.php");
    }else{
        echo "Xác nhận xóa thất bại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    }
    
?>