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

$query_sql = "SELECT * FROM `hanghoa` " ;
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
        <h1>Quản Lý Hàng Hóa</h1>
        <button onclick="Them_HH()" class="themsp">Thêm Hàng Hóa</button>
        <br>
        <br>
        <table width ="100%" class="bang_duyet">
          <tr class="header_tb">
            <th>Mã</th>
            <th>Tên Hàng Hóa</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
          <?php while($list_product=mysqli_fetch_array($query)) { ?>
            <tr>
              <th><?php echo $list_product['MSHH'];?></th>
              <th><?php echo $list_product['TenHH'];?></th>
              <th><?php echo $list_product['Gia'];?></th>
              <th><?php echo $list_product['SoLuongHang'];?></th>
              <th><button class="sua" onclick="Sua(<?php echo $list_product['MSHH'];?>)">Sửa</button></th>
              <th><button class="xoa" onclick="Xoa(<?php echo $list_product['MSHH'];?>)">Xóa</button></th>
            </tr>
          <?php }?>
        </table>
      
        
      </div>
  
    </div>
  </div>
  <script>
      function Sua(id){
        window.location.href="Sua_HH.php?id_HH="+id;
    }
    function Xoa(id){
        window.location.href="SuLyXoa_HH.php?id_HH="+id;
    }
    function Them_HH(){
        window.location.href="Them_HH.php";
    }
  </script>
</body>
</html>