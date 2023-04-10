<main class="w-100 d-f f-d al-c">

  <div class="product-page-banner">
    <span class="product-page-banner_title">Trang chủ - Sản phẩm</span>
  </div>



  <!-- --------------------------Phần lọc sản phẩm----------v--------------- -->

  <div class="search" style="margin-top: 20px;">
    <form action="index.php?act=search_product&header=headerprd" class="d-f form_search_main" method="POST">
      <input type="text" class="input-search" placeholder="nhập tên sản phẩm cần tìm ..." name="value-search" />
      <div class="clear_search">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <input type="submit" value="Tìm kiếm" class="search-btn" name="submit-value-search" />
    </form>
  </div>
  <h1 class="title_product_new" style="margin-top: 20px;">Sản phẩm </h1>

  <!--  -->

  <div class="contain_sideBar-filter_list-product w-100 d-f al-t">
    <div class="side-bar_filter-product">
      <!--  -->
      <label id="title_categorys" for="">Danh Mục </label>
      <ul id="categorys">
        <?php
        for ($i = 0; $i < count($category_home); $i++) {
          $category_name = $category_home[$i]["name"];
          $id =  $category_home[$i]["id"];
          $url_productByType = "index.php?act=productByType&id=$id&header=headerprd";
          $count = count_productByiddm($id);
                  extract($count);
        ?>

          <li style="text-transform:capitalize;"><a id="name_categorys" href="<?= $url_productByType ?>"><?= $category_name ?> (<?php echo $count['0']['count'];?>)</a></li>

        <?php } ?>
      </ul>
      <div style="margin: 15px 0;" class="w-100 block-filter">
        <label for="" style="margin-bottom: 10px;color: crimson;" class="label-filter">Khoảng giá :</label>

        <form action="index.php?act=search_productByPrice&header=headerprd" class="d-f w-100 filter-price m-t-b10 f-d" method="post">
          <div class="m-t-b10 d-f jf-b">
            <input name="price1" type="number" required placeholder="Từ">
            <input name="price2" type="number" required placeholder="Đến">
          </div>
          <input name="submit-price-search" type="submit" value="Tìm kiếm" class="submit-price-search">
        </form>

      </div>
      <!-- <div class="w-100">
                         <label for="" class="label-filter">Nơi bán</label>
                         
                            <form action="" class="d-f w-100 filter-price m-t-b10 f-d">
                             <div class="m-t-b5">
                                 <input type="checkbox" placeholder="Từ" >
                                 <label for="">Hà nội</label>
                             </div>
                             <div class="m-t-b5">
                                 <input type="checkbox" placeholder="Từ" >
                                 <label for="">TP.HCM</label>
                             </div>
                            </form>
                         
                     </div> -->
    </div>
    <!-- --------------------------Phần lọc sản phẩm----------^--------------- -->


    <!-- ------------------------------Phần sản phẩm--------------v----------------        -->

    <div class="contain-product-page d-f">
      <!-- ---------------------------------- -->
      <!--  -->

      <?php
      //  
      if (isset($searchProduct)) {
        // 
        for ($i = 0; $i < count($searchProduct); $i++) {
          $product_name = $searchProduct[$i]["name"];
          $product_price = $searchProduct[$i]["price"];
          $name_image = $searchProduct[$i]["img"];
          $image = $image_path . $name_image;
          $id =  $searchProduct[$i]["id"];
          $url_productDetail = "index.php?act=productDetail&id=$id&header=headerSecond";


      ?>

          <div class="product d-f f-d al-c">
            <div class="product-img w-100">
              <a href="<?= $url_productDetail ?>">
                <img src="<?= $image ?>" alt="" />
              </a>
              <div class="product-icon-cart-heart d-f jf-c">
                <div href="#" class="product_icon product-heart heart  d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart"></i>
                </div>
                <a href="<?= $url_productDetail ?>" class="product_icon d-f jf-c al-c">
                  <i class="fa-solid fa-cart-shopping product_cart"></i>
                </a>
            </div>
            </div>
            <div class="contain-name-price-product w-100">
              <div class="product_name"><?= $product_name ?></div>
              <div class="product_price"><?= number_format($product_price) ?> VNĐ</div>
              <div class="d-f m-t-b5 g-10 al-c">
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart_number"></i>
                  <span class="number_show">10</span>
                </a>
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-regular fa-comment product_comment_number"></i>
                  <span class="number_show">10 comment</span>
                </a>
              </div>
            </div>
          </div>
        <?php
        }
      } else if (isset($category_search)) {
        ?>
        <?php
        for ($i = 0; $i < count($category_search); $i++) {
          $product_name = $category_search[$i]["name"];
          $product_price = $category_search[$i]["price"];
          $name_image = $category_search[$i]["img"];
          $image = $image_path . $name_image;
          $id =  $category_search[$i]["id"];
          $url_productDetail = "index.php?act=productDetail&id=$id&header=headerSecond";


        ?>

          <div class="product d-f f-d al-c">
            <div class="product-img w-100">
              <a href="<?= $url_productDetail ?>">

                <img src="<?= $image ?>" alt="" />
              </a>
              <div class="product-icon-cart-heart d-f jf-c">
                <a href="#" class="product_icon product-heart d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart"></i>
                </a>
                <a href="#" class="product_icon d-f jf-c al-c">
                  <i class="fa-solid fa-cart-shopping product_cart"></i>
                </a>
              </div>
            </div>
            <div class="contain-name-price-product w-100">
              <div class="product_name"><?= $product_name ?></div>
              <div class="product_price"><?= number_format($product_price) ?> VNĐ</div>
              <div class="d-f m-t-b5 g-10 al-c">
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart_number"></i>
                  <span class="number_show">10</span>
                </a>
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-regular fa-comment product_comment_number"></i>
                  <span class="number_show">10 comment</span>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>

      <?php
      } else if (isset($searchProductByprice)) {
      ?>
        <?php
        for ($i = 0; $i < count($searchProductByprice); $i++) {
          $product_name = $searchProductByprice[$i]["name"];
          $product_price = $searchProductByprice[$i]["price"];
          $name_image = $searchProductByprice[$i]["img"];
          $image = $image_path . $name_image;
          $id =  $searchProductByprice[$i]["id"];
          $url_productDetail = "index.php?act=productDetail&id=$id&header=headerSecond";


        ?>

          <div class="product d-f f-d al-c">
            <div class="product-img w-100">
              <a href="<?= $url_productDetail ?>">
                <img src="<?= $image ?>" alt="" />
              </a>
              <div class="product-icon-cart-heart d-f jf-c">
                <div href="#" class="product_icon product-heart heart  d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart"></i>
                </div>
                <a href="<?= $url_productDetail ?>" class="product_icon d-f jf-c al-c">
                  <i class="fa-solid fa-cart-shopping product_cart"></i>
                </a>
            </div>
            </div>
            <div class="contain-name-price-product w-100">
              <div class="product_name"><?= $product_name ?></div>
              <div class="product_price"><?= number_format($product_price) ?> VNĐ</div>
              <div class="d-f m-t-b5 g-10 al-c">
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart_number"></i>
                  <span class="number_show">10</span>
                </a>
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-regular fa-comment product_comment_number"></i>
                  <span class="number_show">10 comment</span>
                </a>
              </div>
            </div>
          </div>

        <?php
        }
      } else {
        ?>
        <?php
        for ($i = 0; $i < count($home_product_page); $i++) {
          $product_name = $home_product_page[$i]["name"];
          $product_price = $home_product_page[$i]["price"];
          $name_image = $home_product_page[$i]["img"];
          $image = $image_path . $name_image;
          $id =  $home_product_page[$i]["id"];
          $url_productDetail = "index.php?act=productDetail&id=$id&header=headerSecond";


        ?>

          <div class="product d-f f-d al-c">
            <div class="product-img w-100">
              <a href="<?= $url_productDetail ?>">
                <img src="<?= $image ?>" alt="" />
              </a>
              <div class="product-icon-cart-heart d-f jf-c">
                <div href="#" class="product_icon product-heart heart  d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart"></i>
                </div>
                <a href="<?= $url_productDetail ?>" class="product_icon d-f jf-c al-c">
                  <i class="fa-solid fa-cart-shopping product_cart"></i>
                </a>
            </div>
            </div>
            <div class="contain-name-price-product w-100">
              <div class="product_name"><?= $product_name ?></div>
              <div class="product_price"><?= number_format($product_price) ?> VNĐ</div>
              <div class="d-f m-t-b5 g-10 al-c">
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-solid fa-heart product_heart_number"></i>
                  <span class="number_show">10</span>
                </a>
                <a href="#" class=" product-heart d-f jf-c al-c">
                  <i class="fa-regular fa-comment product_comment_number"></i>
                  <span class="number_show">10 comment</span>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>




      <?php

      }

      ?>

    </div>
    <!-- ------------------------------Phần sản phẩm--------------^----------------        -->
  </div>




</main>