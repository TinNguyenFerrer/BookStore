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

$query_sql = "SELECT SoDonDH, HoTenKH, SoLuong, TrangThaiHD, SoDonDH, hh.tenHH,hh.Gia FROM
                    (SELECT dh.SoDonDH, kh.HoTenKH,ctdh.SoLuong, dh.TrangThaiHD, ctdh.MSHH  
                        FROM dathang dh 
                            INNER JOIN khachhang kh on dh.MSKH=kh.MSKH 
                            INNER JOIN chitietdathang ctdh ON dh.SoDonDH=ctdh.SoDonDH)as ct
                    INNER JOIN hanghoa hh on ct.MSHH=hh.MSHH
                WHERE TrangThaiHD='Chưa duyệt';" ;
$query = mysqli_query($conn,$query_sql);

?>

<html>
<head>
<title>Duyet Hang</title>
<link rel="stylesheet" href="Quanly.css">
</head>
<body>
  <div class="sidebar-container">
    <div class="sidebar-logo">
        Quản Lý Đơn
    </div>
    <ul class="sidebar-navigation">
      <li>
        <a href="QuanLyDon_Duyet.php">
          <i class="fa fa-home" aria-hidden="true"></i> + Duyệt Hàng
        </a>
      </li>
      <li>
        <a href="QuanLyDon_GiaoHang.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i> + Giao Hàng
        </a>
      </li>
      <li>
        <a href="Da_Giao_Hang.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i> + Đã Giao
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
        <h1>Duyệt Đơn Hàng</h1>
        <br>
        <table width ="100%" class="bang_duyet">
          <tr class="header_tb">
            <th width ="30px">Mã Đơn</th>
            <th width ="100px">Tên Khách Hàng</th>
            <th width ="100px">Tên Sản Phẩm</th>
            <th width ="30px"> Số lượng</th>
            <th width ="50px">Đơn Giá</th>
            <th width ="50px">Trạng thái</th>
          </tr>
          <!-- duyet cac don hang -->
          <?php while($list_product=mysqli_fetch_array($query)) { ?>
            <tr>
                <th><?php echo $list_product['SoDonDH'];?></th>
                <th><?php echo $list_product['HoTenKH'];?></th>
                <th><?php echo $list_product['tenHH'];?></th>
                <th><?php echo $list_product['SoLuong'];?></th>
                <th><?php echo number_format($list_product['Gia']);?></th>
                <th><button class="themsp" onclick="Duyet(<?php echo $list_product['SoDonDH'];?>)">Duyệt</button></th>
            </tr>
          <?php }?>
        </table>
      
        
      </div>
  
    </div>
  </div>
  <script>
      function Duyet(id){
        window.location.href="SuLyDuyetDon.php?id_don="+id;
    }
  </script>
</body>
</html>

