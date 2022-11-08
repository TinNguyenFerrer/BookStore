<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    if(!isset($_GET['id_HH'])){
        echo "Mã nhân viên Không tồn tại.<a style='font-size:20px' href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $id=$_GET['id_HH'];
    //Lấy dữ liệu từ file Sua_NV.php
    $Ten        = addslashes($_POST['TenHH']);
    $Gia        = addslashes($_POST['Gia']);
    $SoLuong    = addslashes($_POST['SoLuong']);
    $QuyCach    = addslashes($_POST['QuyCach']);
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$Ten || !$Gia  || !$SoLuong || !$QuyCach)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
          
    //Lưu thông tin hang hoa vào bảng
    $tt="'";
    $query="UPDATE `hanghoa` SET `TenHH` = $tt$Ten$tt, `MoTaHH` = $tt$QuyCach$tt, `Gia` = $Gia , `SoLuongHang` = $SoLuong WHERE `hanghoa`.`MSHH` = $id ";
    $addmember = mysqli_query($conn,$query);

    //upfile
    $target_dir    = "../KhachHang/Hinh/";
    $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    $allowUpload   = true;
    $upload        = false;
    // Kiểm tra kiểu file
    if (!isset($_FILES["fileupload"]))
  {
    //   echo "Dữ liệu không đúng cấu trúc";
      $upload =false;
  }
    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
        {
            
            $ten=$_FILES["fileupload"]["name"];
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $query_sql_Hinh = "UPDATE `hinhhanghoa` SET `TenHinh` =$tt$ten$tt WHERE MSHH = $id;  ";
            $query_Hinh = mysqli_query($conn,$query_sql_Hinh);
            if($query_Hinh){
                $upload=true;
            }

        }
    }

    if ($addmember){
         header("Location:QuanLy_Kho_HH.php");
        
    }
    else{
        
        echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='QuanLy_NV.php'>Thử lại</a>";
    }
?>
