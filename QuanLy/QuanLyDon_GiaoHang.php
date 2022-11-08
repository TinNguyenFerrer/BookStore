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

$query_sql = "SELECT SoDonDH, HoTenKH, SoLuong, TrangThaiHD, SoDonDH, hh.tenHH,hh.Gia,MSKH FROM
                    (SELECT dh.SoDonDH, kh.HoTenKH, kh.MSKH,ctdh.SoLuong, dh.TrangThaiHD, ctdh.MSHH  
                        FROM dathang dh 
                            INNER JOIN khachhang kh on dh.MSKH=kh.MSKH 
                            INNER JOIN chitietdathang ctdh ON dh.SoDonDH=ctdh.SoDonDH)as ct
                    INNER JOIN hanghoa hh on ct.MSHH=hh.MSHH
                WHERE TrangThaiHD='Đã duyệt';" ;
$query = mysqli_query($conn,$query_sql);

function lay_dia_chi($id_DC){
    include('Connect.php'); 
    $query_sql ="SELECT * FROM diachikh dc INNER JOIN khachhang kh on dc.MSKH=kh.MSKH WHERE kh.MSKH=$id_DC; ";
    $query = mysqli_query($conn,$query_sql);
    if(!$query){
        echo $id_DC;
    }else{
        $list_product=mysqli_fetch_array($query);
        echo $list_product['DiaChi'];
    }

}
?>

<html>
<head>
<title>Giao Hang</title>
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
        <h1>Giao Hàng</h1>
        <br>
        <table width ="100%" class="bang_duyet">
          <tr class="header_tb">
            <th width ="30px">Mã Đơn</th>
            <th width ="100px">Tên Khách Hàng</th>
            <th width ="100px">Địa Chỉ</th>
            <th width ="50px">Tổng Giá</th>
            <th width ="50px">Giao Hàng</th>
          </tr>
          <?php while($list_product=mysqli_fetch_array($query)) { ?>
          <tr>
            <th width ="30px"><?php echo $list_product['SoDonDH'];?></th>
            <th width ="100px"><?php echo $list_product['HoTenKH'];?></th>
            <th width ="100px"><?php lay_dia_chi( $list_product['MSKH']);?></th>
            <th width ="50px">
                <?php 
                    $tonggia=$list_product['Gia']*$list_product['SoLuong'];
                    echo number_format($tonggia);
                ?></th>
            <th width ="50px"><button class="Giaosp" onclick="Giao(<?php echo $list_product['SoDonDH'];?>)">Giao Hàng</button></th>
          </tr>
          <?php }?>
        </table>
      
        
      </div>
  
    </div>
  </div>
  <script>
      function Giao(id){
        window.location.href="SuLyGiaoDon.php?id_don="+id;
    }
  </script>
</body>
</html>