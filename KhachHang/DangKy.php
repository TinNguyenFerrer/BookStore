<!DOCTYPE html>
<html>
    <head>
        <title> Điền thông tin </title>
        <meta charset="utf-8">
        <style type="text/css">
        .login-form{
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 15px;
            border: 2px dotted #cccccc;
            border-radius: 10px;
        }
        .input-box{
            margin-bottom: 10px;
        }
        .input-box input{
            padding: 7.5px 1px;
            width: 100%;
            border: 1px solid #cccccc;
            outline: none;
        }
        .btn-box{
            text-align: center;
            margin-top: 30px;
        }
        .left-button{
            margin-right: 60px;
            padding: 7.5px 15px;
            border-radius: 2px;
            background-color: #009999;
            color: #ffffff;
            border: none;
            outline: none;
            height: 35px;
        }
        .right-button{
            margin-left: 60px;
            padding: 7.5px 15px;
            border-radius: 2px;
            background-color: #009999;
            color: #ffffff;
            border: none;
            outline: none;
            height: 35px;
        }
        </style>
    </head>
    <body>
        <h1 style="text-align: center">ĐĂNG KÍ TÀI KHOẢN HỆ THỐNG</h1>
        <div class="login-form">
            <form name="Form_dang_ki" method="post" action="Sulydangky.php">
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Ten_dang_nhap">Họ tên: <span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input type="text" name="Ten_dang_nhap" id="Ten_dang_nhap">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Pass">Password<span style="color:red" id="error_pass">*</span></label>
                    <br>
                    <input type="password" name="Pass" id="Pass">
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
                <div>
                <div class="btn-box">
                    <button type="submit" class="left-button" onclick="Formtest()">Đăng Ký</button>
                    <button type="reset" class="right-button">Reset</button>
                </div>
            </form>
        </div>
        
            
    </body>
</html>