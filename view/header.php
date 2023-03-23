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
    <link rel="stylesheet" href="css/comment.css">
    <title>Trang chủ</title>
  </head>
  <body>
    <div class="container w-100 d-f f-d">
      <header class="w-100 d-f f-d">
        <!-- ---------header phần liên hệ và đăng nhập-------------- -->

        <div class="header_contact w-100">
          <div class="email d-f al-c">
            <i class="fa-solid fa-envelope"></i>
            admin@gmail.com
          </div>
          <div class="contain_login_social d-f">
            <div class="social d-f">
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
              <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
            </div>
            <div class="line"></div>
            <div class="login">
              <!-- -------------- Chưa đăng nhập-------------- -->

              <!-- <a href="">
                    Đăng nhập
                </a> -->

              <!-- -------------- Đăng nhập rồi------------------ -->

              <i class="fa-solid fa-chevron-down"></i>
              <a
                class="login-userName"
                onclick="redirect('test.html?act=good',1000)"
                >Nguyễn Văn Đức</a
              >
              <ul>
                <li><a href="#">Thông tin tài khoản</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="#">Giỏ hàng</a></li>
                <li><a href="#">Địa chỉ nhận hàng</a></li>
                <li><a href="#">Đăng xuất</a></li>
              </ul>
            </div>
          </div>
        </div>

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
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="contain_like_cart d-f">
            <div class="like">
              <i class="fa-solid fa-heart"></i>
              <div class="number">1</div>
            </div>
            <div class="cart">
              <i class="fa-solid fa-cart-shopping"></i>
              <div class="number">1</div>
            </div>
          </div>
        </div>

        <!-- --------------header phần danh mục và tìm kiếm số điện thoại-----------------   -->

        <div class="header-category_search d-f al-c">
          <div class="contain_category d-f al-c">
            <div class="d-f al-c category">
              <i class="fa-solid fa-bars category-bar"></i>
              <div class="category-text">Danh mục</div>
            </div>
            <i class="fa-solid fa-chevron-down category-icon-down"></i>
            <ul>
            <?php
                for ($i = 0; $i < count($category_home); $i++) {
                  $category_name = $category_home[$i]["name"];                                    
                  $id =  $category_home[$i]["id"];            
                  $url_productByType = "index.php?act=productByType&id=$id&header=headerExtra";


                ?>

                <li><a href="<?= $url_productByType ?>"><?= $category_name ?></a></li>
              
                <?php } ?>
            </ul>
          </div>
          <div class="search">
          <form action="index.php?act=search_product&header=headerSecond" class="d-f" method="POST">
                <input
                  type="text"
                  class="input-search"
                  placeholder="Bạn cần tìm kiếm sản phẩm..."
                  name="value-search"
                />
                <input type="submit" value="Tìm kiếm" class="search-btn" name="submit-value-search" />
            </form>
          </div>
          <div class="contain_number-phone d-f al-c">
            <div class="icon-phone">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div class="numberPhone d-f f-d">
              <span class="numberPhone_number">0123456678</span>
              <span class="numberPhone_24">Hỗ trợ 24/07</span>
            </div>
          </div>
        </div>
      </header>
      <!-- -----------------------main--------------------------- -->