<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> tùy chỉnh </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Sua.css">
    </head>
    <body>
        <h1 style="text-align: center">Thêm Nhân Viên</h1>
        <div class="login-form">
            <form name="Form_dang_ki" method="post" action="SuLy_Them_NV.php">
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="input">Tên <span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input type="text" name="Ten_dang_nhap" id="input" >
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="input">Mật Khẩu<span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input type="text" name="Pass" id="input" >
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Sdt">Số điện thoại<span style="color:red" id="error_sdt">*</span></label>
                    <br>
                    <input type="text" name="Sdt" id="Sdt">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="DiaChi">Địa chỉ<span style="color:red" id="error_ten">*</span></label>
                    <br>
                    <input type="text" name="DiaChi" id="DiaChi">
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
                    <button type="submit" class="left-button">Thêm</button>
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