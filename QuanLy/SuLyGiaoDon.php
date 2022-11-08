<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    
    //duyet don hang
    if(!isset($_GET['id_don'])){
        echo "Mã Đơn Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    }
    $id_don=$_GET['id_don'];
    $query_sql_duyet ="UPDATE dathang SET TrangThaiHD = 'Đã Giao',NgayGH=CURDATE() WHERE dathang.SoDonDH = $id_don;  ";
    $query_sql_duyet = mysqli_query($conn,$query_sql_duyet);
    if($query_sql_duyet){
    header("Location:QuanLyDon_GiaoHang.php");
    }else{
        echo "Xác nhận giao hàng thất bại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    }
    
?>