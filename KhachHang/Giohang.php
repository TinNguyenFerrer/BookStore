<!-- hinh lay tu http://nobita.vn/ -->
<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include('Connect.php'); 
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $welusername="Chào Mừng: $username";
  }else{
    $welusername="Bạn chưa đăng nhập !";
  }
$mask='"';
$query_sql_MSKH = "SELECT MSKH FROM khachhang WHERE HoTenKH=$mask$username$mask;" ;
$query_MSKH = mysqli_query($conn,$query_sql_MSKH);
$MSKH_list=mysqli_fetch_array($query_MSKH);
$MSKH=$MSKH_list['MSKH'];

$query_sql = "SELECT TenHinh,hh.TenHH,hh.Gia,ct.SoLuong,dh.TrangThaiHD FROM chitietdathang ct INNER JOIN dathang dh ON ct.SoDonDH=dh.SoDonDH INNER JOIN hanghoa hh ON ct.MSHH=hh.MSHH INNER JOIN hinhhanghoa hhh ON ct.MSHH=hhh.MSHH WHERE dh.MSKH=$mask$MSKH$mask; " ;
$query = mysqli_query($conn,$query_sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>web bán truyện</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/index2.css">
        <link rel="stylesheet" type="text/css" href="css/Giohang.css">
    </head>
    <body>
    <body>
    <div class="main">
      <header class="header">
          <div class="grid">
              <div class="nameweb">
                <img src="logo2.jpg" alt="" class="header__logo-img"style=“width:150px;height:100%;float:left;”> 
                <img src="NameWeb.png" alt="" class="header__logo-name"style=“width:150px;height:100%;float:left;”> 
                <!-- <h2 style="font-family: Gabriola;">WEB bán truyện tranh</h2> -->
                <!-- <input style="float:left;" type="text" name="Term" id="Term" autocomplete="off" placeholder="Bạn cần tìm gì?" class="form-control ui-autocomplete-input"> -->
              </div>
              
              <div class="menu">
                
                <ul class="header__list">
                  <li class="header__items header__items-one">
                    <span class="header__items-heading"><span class="header__item-heading-child "><a href="index.php" class="header__item-link">Trang Chủ</a></span></span>
                  </li>
                  <li class="header__items header__items-two">
                    <span class="header__items-heading"><span class="header__item-heading-child"><a href="DangKy.php" class="header__item-link">Đăng Ký</a></span></span>
                  </li>
                  <li class="header__items header__items-two">
                    <span class="header__items-heading"><span class="header__item-heading-child"><a href="Dangnhap.php" class="header__item-link">Đăng nhập</a></span></span>
                  </li>
                  <li class="header__items header__items-three">
                    <span class="header__items-heading"><span class="header__item-heading-child current">Giỏ hàng</span></span>
                  </li>
                  <li class="header__items header__items-user">
                    <span><?php echo $welusername?></span>
                  </li>
                </ul>
              </div>
              
            </div>
      </header>
      <div class="list_cart">
        <h1>Danh sách sản phẩm</h1>
        <div class="cart">
          <div class="cart_image" style=" color: black;">
            
          </div>
          <div class="product_name" style="color: black;">Tên sản phẩm</div>
          <div class="price" style="color: black;">Đơn giá</div>
          <div class="product_quantity" style="color: black;">Số lượng</div>
          <div class="sum_price"style="color: black;">Tổng Giá</div>
          <div class="product_del"style="color: black;">
            Trạng Thái
          </div>
        </div>
<!-- DANH SACH SAN PHAM -->
        <?php while($list_product=mysqli_fetch_array($query)) { ?>
            <div class="cart">
            <div class="cart_image">
                <img src="Hinh/<?php echo $list_product['TenHinh'];?>">
            </div>
            <div class="product_name"><?php echo $list_product['TenHH'];?></div>
            <div class="price"><?php echo $list_product['Gia'];?></div>
            <div class="product_quantity" ><?php echo $list_product['SoLuong'];?></div>
            <div class="sum_price">
                <?php 
                    $tonggia=$list_product['Gia']*$list_product['SoLuong'];
                    echo number_format($tonggia);
                ?>đ
            </div>
            <div class="product_del">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg> -->
                <?php echo $list_product['TrangThaiHD'];?>
            </div>
            </div>
        <?php }?>
      </div>
  

</body>
    </body>   
    
</html>