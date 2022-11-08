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
    if(!isset($_GET['id_NV'])){
        echo "Mã nhân viên Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $id=$_GET['id_NV'];
    $query_sql ="SELECT * FROM nhanvien WHERE nhanvien.MSNV = $id;  ";
    $query = mysqli_query($conn,$query_sql);
    if(!$query_sql){
    header("Location:QuanLy_NV.php");
    }
    $list_product=mysqli_fetch_array($query)
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> tùy chỉnh </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Sua.css">
    </head>
    <body>
        <h1 style="text-align: center">Sửa Thông Tin Nhân Viên</h1>
        <div class="login-form">
            <form name="Form_dang_ki" method="post" action="SuLy_CapNhatNV.php?id_NV=<?php echo $id?>">
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="input">Tên <span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input type="text" name="Ten_dang_nhap" id="input" value="<?php echo $list_product['HoTenNV'];?>">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="input">Mật Khẩu<span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input type="text" name="Pass" id="input" value="<?php echo $list_product['MatKhau'];?>">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Sdt">Số điện thoại<span style="color:red" id="error_sdt">*</span></label>
                    <br>
                    <input type="text" name="Sdt" id="Sdt" value="<?php echo $list_product['SoDienThoai'];?>">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="DiaChi">Địa chỉ<span style="color:red" id="error_ten">*</span></label>
                    <br>
                    <input type="text" name="DiaChi" id="DiaChi" value="<?php echo $list_product['DiaChi'];?>">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="ChucVu">Chức Vụ<span style="color:red" id="error_ten">*</span></label>
                    <br>
                    <select id="ChucVu" name="ChucVu">
                        <option value="Duyệt Đơn" selected>Duyệt Đơn</option>
                        <option value="Quản Lý">Quản Lý</option>
                    </select>
                </div>
                
                <div class="btn-box">
                    <button type="submit" class="left-button">Cập Nhật</button>
                    <button type="button" class="right-button" onclick="Thoat()">Thoát</button>
                </div>
            </form>
        </div>
        <script>
            function Thoat(){
                window.location.href="QuanLy_NV.php";
            }

        </script>
    </body>
</html>