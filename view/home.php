   <!-- --------------------------Sản phẩm------------------------- -->
<h1 class="title_product_new">Sản phẩm mới nhất</h1>

<div class="contain-product w-100 d-f">
  <!-- ---------------------------------- -->

  
  <?php
        for ($i = 0; $i < count($home_product); $i++) {
            $product_name = $home_product[$i]["name"];
            $product_price = $home_product[$i]["price"];
            $name_image = $home_product[$i]["img"];
            $image = $image_path . $name_image;
            $id =  $home_product[$i]["id"];
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
  <!-- ---------------------------------- -->
    

</div>
</main>