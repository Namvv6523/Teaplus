<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/cart/cart.css" />
    <link rel="stylesheet" href="css/loading.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/product/product-page.css" />
    <link rel="stylesheet" href="css/product/product-detail.css">
    <link rel="stylesheet" href="css/dangnhap.css" />
    <link rel="stylesheet" href="css/comment.css">
    <link rel="stylesheet" href="css/profileUser.css" />
    <link rel="stylesheet" href="css/lienhe.css">


    <title>Trang chủ</title>
  </head>
  <body>
    <div class="container w-100 d-f f-d">
      <header class="w-100 d-f f-d">
       

        <!-- --------------header phần logo và menu bar----------------- -->
        <div class="header-logo-menu w-100 d-f">
          <div class="contain_logo_menu d-f">
            <div class="logo d-f al-c">
              <a href="#" class="d-f al-c jf-c">
                <img style="width: 80px" src="./img/logo/logo.jpg" alt="" />
              </a>
            </div>

            <div class="menu_bar d-f al-c">
              <ul class="d-f al-c">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="index.php?act=sanpham&header=headerSecond">Sản phẩm</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="index.php?act=lienhe&header=headerSecond">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="d-f">
          <div class="login d-f al-c">
              <!-- -------------- Chưa đăng nhập-------------- -->
  
              <!-- <a href="">
                    Đăng nhập
                </a> -->
  
              <!-- -------------- Đăng nhập rồi------------------ -->


              <?php
                if(isset($_SESSION['user']) && ($_SESSION['user']!="") ){
                    extract($_SESSION['user']);
              ?>
              <i class="fa-solid fa-chevron-down"></i>
              <div class="avatar d-f al-c jf-c">
                <?php if($avatar){ ?>
                <img width="20" src="./upload/<?= $avatar ?>" alt="">

               <?php }  else{?>
                <img width="20" src="./upload/img_user.jpg" alt="">
                <?php } ?>
              </div>
              <a ><?=$user?></a>
              <ul>
                <li><a href="index.php?act=thongtintk&header=headerSecond">Thông tin tài khoản</a></li>

            <?php
            if($_SESSION['user']['role']==1){
              ?>
                <li><a href="admin/index.php" target="_blank">Đăng nhập admin</a></li>
              
              <?php
            }
            ?>
                <!-- <li><a href="#">Đơn hàng</a></li> -->
                <li><a href="index.php?act=viewCart&header=headerSecond">Giỏ hàng</a></li>
                <li><a href="#">Địa chỉ nhận hàng</a></li>
                <li><a href="index.php?act=logout">Đăng xuất</a></li>
              </ul>
              <?php } else { ?>
                <a href="index.php?act=dangnhap&header=headerSecond">  
                  <input type="button" value="đăng nhập" class="input-login">
                </a>
                <a href="index.php?act=dangky&header=headerSecond">  
                  <input type="button" value="đăng ký" class="input-login">
                </a>
              <?php } ?>


  
            
            </div>
            <div class="contain_like_cart d-f">
              <div class="like">
                <i class="fa-solid fa-heart"></i>
                <div class="number">1</div>
              </div>
              <div class="cart">
                <a href="index.php?act=myBill&header=headerSecond">
                  <i style="color:#333" class="fa-solid fa-cart-shopping"></i>
                </a>
                <div class="number"><?php if(isset($count_bill)){echo $count_bill;}else{ echo 0;} ?></div>
              </div>
            </div>
            </div>

        <!-- --------------header phần danh mục và tìm kiếm số điện thoại-----------------   -->
      </header>
      <!-- -----------------------main--------------------------- -->