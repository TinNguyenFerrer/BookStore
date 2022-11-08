<?php
 
    if (!isset($_POST['Ten_dang_nhap'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('Connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['Ten_dang_nhap']);
    $password   = addslashes($_POST['Pass']);
    $Sdt        = addslashes($_POST['Sdt']);
    $DiaChi     =addslashes($_POST['DiaChi']);
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password || !$Sdt || !$DiaChi)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
        // Mã khóa mật khẩu
        $password = md5($password);
          
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT HoTenKH FROM khachhang WHERE HoTenKH='$username'")) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
          
    //Kiểm tra so đien thoai phải là số hay không
    if(!ctype_digit($Sdt)) {
        echo "Số điện thoại này không hợp lệ. Vui long nhập SDT khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //Lưu thông tin thành viên vào bảng
    $addmember = mysqli_query($conn,"
    INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `MatKhau`, `DiaChi`, `SoDienThoai`) 
        VALUES(
            NULL,
            '{$username}',
            '{$password}',
            '{$DiaChi}',
            '{$Sdt}'
        )
    ");     
    //Thông báo quá trình lưu
    if ($addmember){
        echo "Quá trình đăng ký thành công. <a href='index.php'>Về trang chủ</a>";
        header("Location: Dangnhap.php");
    }
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='DangKy.php'>Thử lại</a>";
?>