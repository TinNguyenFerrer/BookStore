<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }

    //Lấy dữ liệu từ file Them_NV.php
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
    $query="INSERT INTO nhanvien (`MSNV`, `HoTenNV`, `MatKhau`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES (NULL, $tt$username$tt, $tt$password$tt, $tt$ChuVu$tt, $tt$DiaChi$tt, $tt$Sdt$tt) ";
    $addmember = mysqli_query($conn,$query);
    if ($addmember){
        echo mysqli_insert_id($conn);
        header("Location:QuanLy_NV.php");
    }
    else
        echo "Có lỗi xảy ra trong quá trình thêm nha vien. <a href='QuanLy_NV.php'>Thử lại</a>";
?>
