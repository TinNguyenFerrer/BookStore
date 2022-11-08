<?php
    session_start();
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    //lay id cua username
    $tt="'";
    $query_layid="SELECT MSNV FROM nhanvien WHERE HoTenNV=$tt$username$tt";
    $query_layid = mysqli_query($conn,$query_layid);
    $list_id=mysqli_fetch_array($query_layid);
    $id=$list_id['MSNV'];
    

    header('Content-Type: text/html; charset=UTF-8');
    //duyet don hang
    if(!isset($_GET['id_don'])){
        echo "Mã Đơn Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    }
    $id_don=$_GET['id_don'];
    $query_sql_duyet ="UPDATE dathang SET TrangThaiHD = 'Đã duyệt',MSNV = $id  WHERE `dathang`.`SoDonDH` = $id_don; ";
    $query_sql_duyet = mysqli_query($conn,$query_sql_duyet);
    header("Location:QuanLyDon_Duyet.php");
    
?>