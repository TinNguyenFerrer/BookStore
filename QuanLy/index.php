<!DOCTYPE html>
<html>
    <head>
        <title> Đăng Nhập Quản Lý </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <h1 style="text-align: center">ĐĂNG NHẬP QUẢN LÝ</h1>
        <div class="login-form">
            <form name="Form_dang_ki" method="post" action="Sulydangnhap.php">
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Ten_dang_nhap">Tên đăng nhập: <span style="color:red" id="error_ten_dang_nhap">*</span></label>
                    <br>
                    <input onblur="Check_Ten_dang_nhap()" type="text" name="Ten_dang_nhap" id="Ten_dang_nhap">
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Pass">Password<span style="color:red" id="error_pass">*</span></label>
                    <br>
                    <input onblur="Check_pass()" type="password" name="Pass" id="Pass">
                </div>
                <div class="btn-box">
                    <button type="submit" class="left-button">Đăng nhập</button>
                    <button type="reset" class="right-button">Reset</button>
                </div>
            </form>
        </div>
        <script>
            function Check_Ten_dang_nhap(){
                var Ten_dang_nhap = document.getElementById("Ten_dang_nhap").value;
                var errorr = document.getElementById("error_ten_dang_nhap");
                var Re_Ten = /^[a-z0-9]/i;
                var Re_ten1 = /\s/; 
                if (Ten_dang_nhap =='' || Ten_dang_nhap==null){
                    errorr.innerHTML = "(Không được để trống)";
                }
            }
            function Check_pass(){
                var pass = document.getElementById("Pass").value; 
                var errorr = document.getElementById("error_pass");
                if (pass =='' || pass==null){
                    errorr.innerHTML = "(Không được để trống)";
                }
            }
            
        </script>
    </body>
</html>