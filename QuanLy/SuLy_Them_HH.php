<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include('Connect.php');

    if(isset($_SESSION['usernameQL'])){
        $username=$_SESSION['usernameQL'];
    }else{
        header("Location:index.php");
    }
    
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
    $query="INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTaHH`, `Gia`, `SoLuongHang`) VALUES (NULL, $tt$Ten$tt, $tt$QuyCach$tt, $Gia, $SoLuong);  ";
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
      echo "Dữ liệu không đúng cấu trúc";
      die;
  }
    if ($allowUpload)
    {
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
        {
            
            $ten=$_FILES["fileupload"]["name"];
            $id=mysqli_insert_id($conn);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $query_sql_Hinh = "INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES (NULL, $tt$ten$tt, $id);  ";
            $query_Hinh = mysqli_query($conn,$query_sql_Hinh);
            if($query_Hinh){
                $upload=true;
            }

        }
    }

    if ($addmember&&$upload){
        header("Location:QuanLy_Kho_HH.php");
        
        
    }
    else{
        echo $query_sql_Hinh;
        echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='QuanLy_NV.php'>Thử lại</a>";
    }
?>
