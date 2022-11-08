<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php'); 
    if(!isset($_GET["masp"]) || !isset($_SESSION['username'])){
        $alert='<script> window.alert("bạn chưa đăng nhập hoặc chọn sách để đặt hàng"); window.location="index.php"</script>';
        echo $alert;
        // header("Location:index.php");
    }

    //lay MSKH tu TenKH
    $username=$_SESSION['username'];
    $masp_ct=$_GET["masp"];//lay maHH
    $query_sql_MSKH = "SELECT MSKH FROM khachhang WHERE HoTenKH='$username';" ;
    $query_MSKH = mysqli_query($conn,$query_sql_MSKH);
    //lay so luong san pham
    $SoLuongHH=$_POST['num'];
    //kiem tra loi
    if(mysqli_num_rows($query_MSKH)==0){
        echo '<script> window.alert("Thất bại khi lấy MSKH"); window.location="index.php"</script>';
        exit;
    } 
    $MSKH_list=mysqli_fetch_array($query_MSKH);
    $MSKH=$MSKH_list['MSKH'];

    //them vao bang dathang
    $query_sql_dathang = "INSERT INTO dathang (`MSKH`, `NgayDH`) VALUES ('$MSKH',CURRENT_DATE); " ;
    $query_dathang = mysqli_query($conn,$query_sql_dathang);
    if(!$query_dathang){
        echo '<script> window.alert("Thất bại khi đặt hàng"); window.location="index.php"</script>';
        exit;
    }

    //lay SoDonHD
    $query_sql_getidHD="SELECT LAST_INSERT_ID() as ID;";
    $query_IDHD=mysqli_query($conn,$query_sql_getidHD);
    $IDHD=mysqli_fetch_array($query_IDHD);
    $SoDonHD = $IDHD['ID'];
    
    //lay gia san pham
    $query_sql_gia="SELECT Gia FROM hanghoa WHERE MSHH=$masp_ct; ";
    $query_gia=mysqli_query($conn,$query_sql_gia);
    $Gia_list=mysqli_fetch_array($query_gia);
    $Gia = $Gia_list['Gia'];

    //them vao bang chitietdathang
    $query_sql_chitiet_dathang = "INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES ('$SoDonHD', '$masp_ct', '$SoLuongHH', '$Gia')"; 
    $query_ct_dathang = mysqli_query($conn,$query_sql_chitiet_dathang);
    if(!$query_ct_dathang){
        echo 'thêm chi tiết đặt hàng thất bại';
    }else{
        echo '<script> window.alert("Đặt hành thành công"); window.location="index.php"</script>';
    }
?>