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
    <link rel="stylesheet" href="css/loading.css" />
    <link rel="stylesheet" href="css/banner.css" />
    <link rel="stylesheet" href="css/slide.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <title>Trang chủ</title>
  </head>
  <body>
    <div class="container w-100 d-f f-d">
     
      <!-- -----------------------main--------------------------- -->
      <main class="w-100 d-f f-d al-c">
        <header class="w-100 d-f f-d header-main">
      

          <!-- --------------header phần logo và menu bar----------------- -->
          <div class="header-logo-menu w-100 d-f">
            <div class="contain_logo_menu d-f">
              <div class="logo d-f al-c">
                <a href="#" class="d-f al-c jf-c">
                  <img style="width: 80px" src="./img/logo/logo_png.png" alt="" />
                </a>
              </div>
  
              <div class="menu_bar d-f al-c">
                <ul class="d-f al-c">
                  <li><a class="header-main-link" href="index.php">Trang chủ</a></li>
                  <li><a class="header-main-link" href="#">Sản phẩm</a></li>
                  <li><a class="header-main-link" href="#">Tin tức</a></li>
                  <li><a class="header-main-link" href="#">Liên hệ</a></li>
                </ul>
              </div>
            </div>
            <div class="line"></div>
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
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="#">Giỏ hàng</a></li>
                <li><a href="#">Địa chỉ nhận hàng</a></li>
                <li><a href="index.php?act=logout">Đăng xuất</a></li>
              </ul>
              <?php } else { ?>
                <a href="index.php?act=dangnhap&header=headerSecond">  
                  <input type="button" value="đăng nhập">
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
                  <i class="fa-solid fa-cart-shopping"></i>
                </a>
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
                  $url_productByType = "index.php?act=productByType&id=$id&header=headerSecond";
                  

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
             
            </div>
          </div>
        </header>
        <!-- -------------------------------------------header ^--------------------------- -->
        <div class="wrap_banner">
          <div class="contain-banner w-100">
            <div class="banner_back d-f al-c jf-c">
              <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="banner_next d-f al-c jf-c">
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="banner w-100 d-f">
              <div class="banner_img w-100">
                <a href="#">
                  <img src="./img/banner/banner1.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="banner_img w-100">
                <a href="#">
                  <img src="./img/banner/banner6.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="banner_img w-100">
                <a href="#">
                  <img src="./img/banner/banner7.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="banner_img w-100">
                <a href="#">
                  <img src="./img/banner/banner8.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="banner_img w-100">
                <a href="#">
                  <img src="./img/banner/banner9.jpg" alt="" />
                </a>
              </div>
            </div>
          </div>
          <div class="info_banner">
            <ul class="d-f jf-c">
              <li class="d-f jf-c al-c info_product active_info">
                Thỏa cơn khát hè
              </li>
              <li class="d-f jf-c al-c info_product">Trà sữa ngọt ngào</li>
              <li class="d-f jf-c al-c info_product">Rủ bạn bè trà sữa</li>
              <li class="d-f jf-c al-c info_product">Cơn sốt trà sữa</li>
              <li class="d-f jf-c al-c info_product">Taste the Love</li>
            </ul>
          </div>
        </div>

        <div class="wrap_slide_product">
          <div class="contain-slide_product w-100">
            <div class="slide_product_back d-f al-c jf-c">
              <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="slide_product_next d-f al-c jf-c">
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="slide_product w-100 d-f">
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts1.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts2.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts3.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts4.jpg" alt="" />
                </a>
              </div>
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts5.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts6.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts7.jpg" alt="" />
                </a>
              </div>
              <!-- ---- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts8.jpg" alt="" />
                </a>
              </div>
              <!-- --------------------------- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts9.jpg" alt="" />
                </a>
              </div>
              <!-- --------------------------- -->
              <div class="slide_product_img w-100">
                <a href="#">
                  <img src="./img/product/ts9.jpg" alt="" />
                </a>
              </div>
            </div>
          </div>
          <div class="info_slide_product">
            <ul class="d-f jf-c">
              <li class="d-f jf-c al-c info_slideProduct active_slide"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
              <li class="d-f jf-c al-c info_slideProduct"></li>
            </ul>
          </div>
        </div>