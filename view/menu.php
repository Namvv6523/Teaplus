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
              <?php
                if(isset($_SESSION['user']) && ($_SESSION['user']!="") ){
                    extract($_SESSION['user']);
          ?>
              <a
              href="#"
                class="login-userName"
                onclick="redirect('test.html?act=good',1000)"
                ><?=$user?></a>
              <ul>
                <li><a href="index.php?act=thongtintk">Thông tin tài khoản</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="#">Giỏ hàng</a></li>
                <li><a href="#">Địa chỉ nhận hàng</a></li>
                <li><a href="index.php?act=logout">Đăng xuất</a></li>
              </ul>
              <?php 
                }else{
                    ?>
         <a href="index.php?act=dangnhap">  <input type="button" value="đăng nhập"></a>
         <?php 
            }
            ?>

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
              <li><a href="#">Trà sữa trân châu</a></li>
              <li><a href="#">Trà sữa matcha</a></li>
              <li><a href="#">Trà sữa dâu tây</a></li>
              <li><a href="#">Trà sữa chocolate</a></li>
              <li><a href="#">Trà sữa việt quất</a></li>
            </ul>
          </div>
          <div class="search">
            <form action="" class="d-f">
              <input
                type="text"
                class="input-search"
                placeholder="Bạn cần tìm kiếm sản phẩm..."
              />
              <input type="submit" value="Tìm kiếm" class="search-btn" />
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