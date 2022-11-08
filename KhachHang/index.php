<!-- hinh lay tu http://nobita.vn/ -->
<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include('Connect.php'); 
$tt="'";
// cho tim kiem
if(isset($_GET['search'])){
  $rearch = $_GET['search'];
  $query_sql="SELECT hanghoa.MSHH, hanghoa.TenHH,hanghoa.Gia,hinhhanghoa.TenHinh FROM hanghoa INNER JOIN hinhhanghoa ON hanghoa.MSHH=hinhhanghoa.MSHH WHERE hanghoa.TenHH LIKE $tt%$rearch%$tt;";
}
else{
  $query_sql="SELECT hanghoa.MSHH, hanghoa.TenHH,hanghoa.Gia,hinhhanghoa.TenHinh FROM hanghoa INNER JOIN hinhhanghoa ON hanghoa.MSHH=hinhhanghoa.MSHH;";
}

$query = mysqli_query($conn,$query_sql);
$welusername='';
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  $welusername="Chào Mừng: $username";
}else{
  $welusername="Bạn chưa đăng nhập !";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>web bán truyện</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/index2.css">
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
                    <span class="header__items-heading"><span class="header__item-heading-child current"><a href="./" class="header__item-link">Trang Chủ</a></span></span>
                  </li>
                  <li class="header__items header__items-two">
                    <span class="header__items-heading"><span class="header__item-heading-child"><a href="Dangky.php" class="header__item-link">Đăng Ký</a></span></span>
                  </li>
                  <li class="header__items header__items-two">
                    <span class="header__items-heading"><span class="header__item-heading-child"><a href="Dangnhap.php" class="header__item-link">Đăng nhập</a></span></span>
                  </li>
                  <li class="header__items header__items-three">
                    <span class="header__items-heading"><span class="header__item-heading-child"><a href="<?php if($welusername=="Bạn chưa đăng nhập !")echo "Dangnhap.php"; else echo "Giohang.php";?>" class="header__item-link">Giỏ hàng</a></span></span>
      
                  </li>
                  <li class="header__items header__items-user">
                  
                    <span><?php echo $welusername?></span>
                  </li>
                </ul>
              </div>
              
            </div>
      </header>
      <div class="pi">
        <!-- tim kiem -->
        <div class="filter_product">
          <div class="rearch_product">
            <div class="search-box">
              <span class="search_title_note">Tìm Kiếm:  </span>
              
                <input id="search-input" class="search-input" placeholder="Search..">
                <button onclick="search()" class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
                </button>
              
            </div>
          </div>
        </div>
        <div class="home-product-item">
          <!-- SAN PHAM -->
          <?php while($list_product=mysqli_fetch_array($query)){ ?>
            <a class="home-product-item_col" href="ChiTietSP.php?masp=<?php echo $list_product['MSHH'];?>">
                <div class="home-product-item_img" style="background-image:url(hinh/<?php echo $list_product['TenHinh'];?>"></div>
                <div class="pading">
                    
                    <div class="home-product-item-img_properties">
                        <span style="color: rgb(238, 44, 44); font-size: 110%;" >Giá: <?php echo number_format($list_product['Gia']);?>đ</span>
                    </div>
                    <div class="home-product-item-img_properties">
                        <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px; ">
                            <li style="color: orange; font-size: 10pt; padding-top: 2px; margin-right: 5px;">5.0</li>
                            <li style="color: orange; padding: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                            </li>
                            <li style="color: orange; padding: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                            </li>
                            <li style="color: orange; padding: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                            </li>
                            <li style="color: orange; padding: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                            </li>
                            <li style="color: orange; padding: 2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="home-product-item-img_properties">
                        <span><?php echo $list_product['TenHH'];?></span>
                    </div>
                </div>
            </a >
          <?php }?>
      </div>
  <script type="text/javascript">
    function search() {
      const result  = document.getElementById("search-input").value;
      
      window.location="./index.php?search="+result;
    }
  </script>

</body>
    </body>   
    
</html>