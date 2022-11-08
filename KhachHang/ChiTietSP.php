<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include('Connect.php'); 
if(!isset($_GET["masp"])){
    header("Location:index.php");
}
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $welusername="Chào Mừng: $username";
  }else{
    $welusername="Bạn chưa đăng nhập !";
}
$masp_ct=$_GET["masp"];
$query_sql = "SELECT hanghoa.MSHH, hanghoa.TenHH,hanghoa.Gia,hinhhanghoa.TenHinh, hanghoa.MoTaHH, hanghoa.SoLuongHang FROM hanghoa INNER JOIN hinhhanghoa ON hanghoa.MSHH=hinhhanghoa.MSHH WHERE hanghoa.MSHH = '$masp_ct';" ;
$query = mysqli_query($conn,$query_sql);
?>
<html lang="en">
    <head>
        <title>web bán truyện</title>
        <meta charset="utf-8">
        <!-- CSS only -->
        
        <link rel="stylesheet" type="text/css" href="css/index2.css">
        <link rel="stylesheet" type="text/css" href="css/ChiTietSP.css"/>
        
        
    </head>
    <body>
        <div class="main">
            <header class="header">
                <div class="grid">
                    <div class="nameweb">
                        <img src="logo2.jpg" alt="" class="header__logo-img"style=“width:150px;height:100%;float:left;”> 
                        <img src="NameWeb.png" alt="" class="header__logo-name"style=“width:150px;height:100%;float:left;”> 
                        
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
                            <span class="header__items-heading"><span class="header__item-heading-child current"><a href="Giohang.php" class="header__item-link">Giỏ hàng</a></span></span>
                            
                        </li>
                        <li class="header__items header__items-user">
                            <span><?php echo $welusername?></span>
                        </li>
                        </ul>
                    </div>
                    
                </div>
            </header>
        </div>
        <div class="content1">
        <?php while($list_product=mysqli_fetch_array($query)) { ?>
            <div class="image" >
                <img src="hinh/<?php echo $list_product['TenHinh'];?>" style="width: 100%;">
            </div>
            <div class="content">
                <!-- NỘI DUNG -->
                <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li>&ensp;/  <?php echo $list_product['TenHH'];?></li>
                </ul>
                <br>
                <h1 style="text-transform: uppercase"><?php echo $list_product['TenHH'];?></h1>
                <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
                    <li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
                    <li style="color: orange; padding: 2px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                    </li>
                    <li style="color: orange; padding: 2px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                    </li>
                    <li style="color: orange; padding: 2px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                    </li>
                    <li style="color: orange; padding: 2px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                    </li>
                    <li style="color: orange; padding: 2px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                    </li>
                    <li style="margin-left: 20px; border-left: solid #dad7d7 1px; font-size: 13pt; padding-top: 3px; padding-left: 20px;">Rất hay</li>
                </ul>
                <div class="price"><?php echo number_format($list_product['Gia']);?>đ</div>
                <form action="Dathang.php?masp=<?php echo $masp_ct?>" method="post">
                    <div class="buy" style="display: flex;">
                        <button type="button" class="btn_btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(<?php echo $list_product['SoLuongHang'];?>,-1)">-</button>
                        <input max="<?php echo $list_product['SoLuongHang'];?>" type="number" name="num" class="form-control" id="quantity" step="1" value="1" style="max-width: 90px;border: solid #e0dede 1px; border-radius: 0px;font-size: larger;" onchange="addMoreCart(<?php echo $list_product['SoLuongHang'];?>,0)">
                        <button type="button" class="btn_btn-light" style="border: solid #e0dede 1px; border-radius: 0px;" onclick="addMoreCart(<?php echo $list_product['SoLuongHang'];?>,1)">+</button>
                        <label> Còn lại <?php echo $list_product['SoLuongHang'];?> Quyển</label>
                    </div>
                    <button type="submit" class="btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-bag-check" viewBox="1 0 18 16">
                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                        THÊM VÀO GIỎ HÀNG
                    </button>
                </form>
                <h1>Tóm tắt</h1>
                <div class="abstract">
                <p> <?php echo $list_product['MoTaHH'];?></p>
                </div>
            </div>
            <?php }?>
        </div> 
        <!-- Script -->
      
</body>  
    
</html>

<script type="text/javascript">
        function addMoreCart(max,delta) {
          id_quantity=document.getElementById("quantity");
          num = parseInt(id_quantity.value);
          num += delta;
          if(num < 1) num = 1;
          if(num >max) num =max;
          id_quantity.value=num;
          console.log
        }
      
        
      </script>
