<main class="w-100 d-f f-d al-c">
               
               <h1 class="title_product_new">Danh mục </h1>
             
        <!-- --------------------------Sản phẩm------------------------- -->
     
<div class="contain-product w-100 d-f">
  <!-- ---------------------------------- -->

  
  <?php
        for ($i = 0; $i < count($category_search); $i++) {
            $product_name = $category_search [$i]["name"];
            $product_price = $category_search [$i]["price"];
            $name_image = $category_search [$i]["img"];
            $image = $image_path . $name_image;
            $id =  $category_search [$i]["id"];
            $url_productDetail = "index.php?act=productDetail&id=$id&header=sign_in";


        ?>

  <div class="product d-f f-d al-c">
    <div class="product-img w-100">
      <a href="#">
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