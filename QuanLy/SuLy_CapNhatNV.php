<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    if(!isset($_GET['id_NV'])){
        echo "Mã nhân viên Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $id=$_GET['id_NV'];
    //Lấy dữ liệu từ file Sua_NV.php
    $username   = addslashes($_POST['Ten_dang_nhap']);
    $password   = addslashes($_POST['Pass']);
    $Sdt        = addslashes($_POST['Sdt']);
    $DiaChi     =addslashes($_POST['DiaChi']);
    $ChuVu      =addslashes($_POST['ChucVu']);
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$Sdt  || !$DiaChi || !$ChuVu)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
         $password = md5($password);
          
    //Kiểm tra so đien thoai phải là số hay không
    if(!ctype_digit($Sdt)) {
        echo "Số điện thoại này không hợp lệ. Vui long nhập SDT khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lưu thông tin thành viên vào bảng
    $tt="'";
    $query="UPDATE `nhanvien` SET `HoTenNV` = $tt$username$tt, `MatKhau` = $tt$password$tt, `DiaChi` = $tt$DiaChi$tt,`ChucVu` = $tt$ChuVu$tt, SoDienThoai=$tt$Sdt$tt WHERE `nhanvien`.`MSNV` = $id ";
    $addmember = mysqli_query($conn,$query);
    if ($addmember){
        header("Location:QuanLy_NV.php");
    }
    else
        echo $query;
        echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='QuanLy_NV.php'>Thử lại</a>";
?>
