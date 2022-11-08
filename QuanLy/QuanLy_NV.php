<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include('Connect.php'); 

if(isset($_SESSION['usernameQL'])){
    $username=$_SESSION['usernameQL'];
    $welusername="Chào Mừng: $username";
  }else{
    header("Location:index.php");
}

$query_sql = "SELECT * FROM nhanvien " ;
$query = mysqli_query($conn,$query_sql);

?>

<html>
<head>
<title>Quan Ly</title>
<link rel="stylesheet" href="Quanly.css">
</head>
<body>
  <div class="sidebar-container">
    <div class="sidebar-logo">
         Quản Lý
    </div>
    <ul class="sidebar-navigation">
      <!-- <li class="header">Quản lý đơn</li> -->
      <li class="header">Nhân Viên</li>
      <li>
        <a href="QuanLy_NV.php">
          <i class="fa fa-home" aria-hidden="true"></i> +  Quản Lý Nhân Viên
        </a>
      </li>
      <li class="header">Kho Hàng</li>
      <li>
        <a href="QuanLy_Kho_HH.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i> +  Quản Lý Hàng Hóa
        </a>
      </li>
    </ul>
  </div>
  <div class="head_user">
    
  </div>
  <div class="content-container">
  
    <div class="container-fluid">
  
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <p><?php echo $welusername?></p>
        <h1>Quản Lý Nhân Viên</h1>
        <button class="themsp" onclick="Them_NV()">Thêm Nhân Viên</button>
        <br>
        <br>
        <table width ="100%" class="bang_duyet">
          <tr class="header_tb">
            <th>Mã</th>
            <th>Tên Nhân Viên</th>
            <th>Chức Vụ</th>
            <th> Địa chỉ</th>
            <th>SĐT</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
          <?php while($list_product=mysqli_fetch_array($query)) { ?>
            <tr>
                <th><?php echo $list_product['MSNV'];?></th>
                <th><?php echo $list_product['HoTenNV'];?></th>
                <th><?php echo $list_product['ChucVu'];?></th>
                <th> <?php echo $list_product['DiaChi'];?></th>
                <th><?php echo $list_product['SoDienThoai'];?></th>
                <th><button class="sua" onclick="Sua(<?php echo $list_product['MSNV'];?>)">Sửa</button></th>
                <th><button class="xoa" onclick="Xoa(<?php echo $list_product['MSNV'];?>)">Xóa</button></th>
            </tr>
          <?php }?>
        </table>
      
        
      </div>
  
    </div>
  </div>
  <script>
      function Sua(id){
        window.location.href="Sua_NV.php?id_NV="+id;
    }
    function Xoa(id){
        window.location.href="SuLyXoa_NV.php?id_NV="+id;
    }
    function Them_NV(){
        window.location.href="Them_NV.php";
    }
  </script>
</body>
</html>