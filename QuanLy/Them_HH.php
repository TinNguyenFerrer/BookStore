<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    
    // //duyet don hang
    // if(!isset($_GET['id_HH'])){
    //     echo "Mã hàng hóa Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
    //     exit;
    // }
    // $id=$_GET['id_HH'];
    // $query_sql ="SELECT * FROM hanghoa WHERE hanghoa.MSHH = $id;  ";
    // $query = mysqli_query($conn,$query_sql);
    // if(!$query_sql){
    // header("Location:QuanLy_NV.php");
    // }
    // $list_product=mysqli_fetch_array($query);

    // //lay ma hinhHH
    // $query_sql_Hinh ="SELECT TenHinh FROM `hinhhanghoa` WHERE MSHH= $id;  ";
    // $query_Hinh = mysqli_query($conn,$query_sql_Hinh);
    // if(!$query_Hinh){
    // header("Location:QuanLy_NV.php");
    // }
    // $list_Hinh=mysqli_fetch_array($query_Hinh);

    // //lay cac ma LoaiHang
    // $query_sql_loai ="SELECT * FROM `loaihanghoa`";
    // $query_loai = mysqli_query($conn,$query_sql_loai);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> tùy chỉnh </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./Sua.css">
    </head>
    <body>
        <h1 style="text-align: center">Thêm Hàng Hóa</h1>
        <div class="login-form">
            <form name="Form_dang_ki" method="post" action="SuLy_Them_HH.php?" enctype="multipart/form-data">
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="TenHH">Tên <span style="color:red">*</span></label>
                    <br>
                    <input type="text" name="TenHH" id="TenHH" >
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="Gia">Giá <span style="color:red">*</span></label>
                    <br>
                    <input style=" width: 300px;" type="number" name="Gia" id="Gia" >
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="SoLuong">Số Lượng <span style="color:red">*</span></label>
                    <br>
                    <input style=" width: 300px;" type="number" name="SoLuong" id="SoLuong" >
                </div>
                <div>
                    <label style="text-align: left; font-size: 130%;" for="SoLuong">Hình <span style="color:red">*</span></label>
                    <br>
                    
                    <br>
                    Chọn file để upload:<br>
                    <input type="file" name="fileupload" id="fileupload"><br> <br>
                        
                </div>
                <div class="input-box">
                    <label style="text-align: left; font-size: 130%;" for="QuyCach">Tóm Tắt <span style="color:red">*</span></label>
                    <br>
                    <textarea name="QuyCach" rows="5" cols="48" id="QuyCach">
                        
                    </textarea>
                </div>
                
                
                
                <div class="btn-box">
                    <button type="submit" class="left-button">Thêm hàng hóa</button>
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