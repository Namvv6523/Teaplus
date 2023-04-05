
      <main class="w-100 d-f f-d al-c">
      

        <!-- --------------------------Sản phẩm------------------------- -->
        <h1 class="title_product_new">Chi tiết sản phẩm</h1>
<!-- -----------------------------Chi tiết sản phẩm---------------------------- -->
        <div class="contain_product-detail w-100 d-f jf-b">

        <?php
        $product_name = $productDetail['name'];
        $id = $productDetail['id'];
        $view = $productDetail['luotxem'];
        $price = $productDetail['price'];
        $description = $productDetail['mota'];
        $image_name = $productDetail['img'];
        $image_url = "upload/";
        $image = $image_url . $image_name;
        $number =  0;
        $totalPrice = $price + $number;
        ?>

            <!-- ------------------Phần tên sản phẩm và ảnh sản phẩm----------V--------- -->
            <div class="detail-name-img d-f f-d">
                <div class="detail_name">
                    <h2><?= $product_name ?></h2>
                </div>
                <div class="detail_img">
                    
                        <img src="<?= $image ?> " alt="">
                    
                </div>
            </div>
            <!-- ------------------Phần tên sản phẩm và ảnh sản phẩm----------^--------- -->
            <!-- --------------------------------Phần chọn đường đá topping----------------------- -->
            <div class="all_detail_about_product">
                <div class="detail_description">
                  Mô tả : <?= $description ?>
                </div>
                <div class="detail_size">
                    <form action="index.php?act=addToCart&header=headerSecond&f=1" class="w-100" method="POST">
                        <input hidden type="text" name="product_name" value="<?= $product_name ?>">
                        <input hidden type="number" name="product_price" value="<?= $price ?>">
                        <input hidden type="text" name="image" value="<?= $image ?>">
                        <input hidden type="text" name="id" value="<?= $id ?>">
                        <section class="block_up d-f jf-b al-t">
                          
                          <div class="block_up-product-name-price d-f f-d">
                            <div class="d-f al-c m-t-b10 g-10">
                              <label for="" style="font-size: 1.65rem" class="label_block_up-price"
                                >Giá :
                              </label
                              >
                              <input
                                style="padding: 5px 0px;width: 80px;padding-left: 10px;text-align: center;"
                                type="number"
                                value="<?= $price ?>"
                                class="block_up-price product_price"                                
                                disabled
                              />
                            </div>
                            <div class="quantity d-f al-c">
                              <div class="subtract circle_border">
                                <i class="fa-solid fa-minus"></i>
                              </div>
                              <div class="product_quantity">1</div>
                              <input style="width:40px" type="number" name="quantity" hidden>
                              <div class="add circle_border">
                                <i class="fa-solid fa-plus"></i>
                              </div>
                              <div class="result"><?= number_format($totalPrice) ?>đ</div>
                            </div>
                          </div>
              
                         
                        </section>
                        <!-- -------------------------------------- -->
                        <section class="block_down w-100">
                          <!-- <div class="d-f jf-b m-t-b10"> -->
                            <div class="sugar choice-block choice-block ">
                              <span class="choice">
                                <i class="fa-solid fa-cubes-stacked"></i> Chọn đường</span
                              >
                              <div class="d-f jf-b contain-choice">
                                <div class="d-f f-d">
                                <div class="d-f g-10">
                                  <input type="radio" value="2000" class="input" name="sugar"  />
                                  <input type="radio" value="0" class="input" name="sugar" checked hidden />
                                  <label for="">100% </label>
                                </div>
                                <span>(2,000 VNĐ)</span>
                                </div>

                               <div class="d-f f-d">

                               <div class="d-f g-10">
                                  <input type="radio" value="1000" class="input" name="sugar" />
                                  <label for="">70% </label>
                                </div>
                                <span>(1,000 VNĐ)</span>

                               </div>
                               <!-- ------------------ -->
                               <div class="d-f f-d">

                               <div class="d-f g-10">
                                  <input type="radio" value="0" class="input" name="sugar" />
                                  <label for="">0% </label>
                                </div>
                                <span>(0 VNĐ)</span>

                               </div>
                              </div>
                            </div>
                            <!-- ------ -->
                            <div class="size choice-block m-t-b10">
                              <span class="choice"
                                ><i class="fa-solid fa-mug-hot"></i> Chọn size</span
                              >
                              <div class="d-f jf-b contain-choice">

                                <div class="d-f f-d">

                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="5000"
                                    class="input"
                                    id="size"
                                    name="size"
                                    
                                  />
                                  <input
                                    type="radio"
                                    value="0"
                                    class="input"
                                    id="size"
                                    name="size"
                                    hidden
                                    checked
                                    
                                  />
                                  <label for="">M </label>
                                </div>
                                <span>(5,000 VNĐ)</span>

                                </div>
                                <div class="d-f f-d">
                                <div class="d-f g-10">
                                  <input type="radio" value="10000" class="input" id="size" name="size" />
                                  <label for="">L </label>
                                </div>
                                <span>(10,000 VNĐ)</span>
                                </div>
                              </div>
                            </div>
                            <!-- ------ -->
                          <!-- </div> -->
                          <!-- -------------------------- -->
                          <div class="m-t-b10">
                            <div class="ice-rock choice-block w-100">
                              <span class="choice"
                                ><i class="fa-solid fa-snowflake"></i> Chọn đá</span
                              >
                              <div class="d-f jf-b contain-choice">
                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="5"
                                    class="input"
                                    name="ice-rock"
                                    
                                  />
                                  <input
                                    type="radio"
                                    value="0"
                                    class="input"
                                    name="ice-rock"
                                    hidden
                                    checked
                                    
                                  />
                                  <label for="">100%</label>
                                </div>
                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="4"
                                    class="input"
                                    name="ice-rock"
                                  />
                                  <label for="">70%</label>
                                </div>
                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="3"
                                    class="input"
                                    name="ice-rock"
                                  />
                                  <label for="">50%</label>
                                </div>
                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="2"
                                    class="input"
                                    name="ice-rock"
                                  />
                                  <label for="">30%</label>
                                </div>
                                <div class="d-f g-10">
                                  <input
                                    type="radio"
                                    value="1"
                                    class="input"
                                    name="ice-rock"
                                  />
                                  <label for="">Không đá</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- ------------ -->
                          <div>
                            <div class="topping choice-block w-100">
                              <span class="choice"
                                ><i class="fa-solid fa-wine-bottle"></i> Chọn Topping</span
                              >
                              <div class="d-f jf-b f-d contain-choice">
                                
                                <div class="d-f jf-b">
                                <div class="d-f g-10">
                                  <input
                                    type="checkbox"
                                    name="topping[]"
                                    class="input"
                                    value="4000"
                                  />
                                  <label for="">Chân trâu baby </label>
                                </div>
                                <span class="price-beside">(4000 VNĐ)</span>

                                </div>

                                <div class="d-f jf-b">
                                <div class="d-f g-10">
                                  <input
                                    type="checkbox"
                                    name="topping[]"
                                    class="input"
                                    value="6000"
                                  />
                                  <label for="">Khoai môn</label>
                                </div>
                                <span class="price-beside">(6000 VNĐ)</span>
                                </div>

                                <div class="d-f jf-b">
                                <div class="d-f g-10">
                                  <input
                                    type="checkbox"
                                    name="topping[]"
                                    class="input"
                                    value="7000"
                                  />
                                  <label for="">Trân châu đen</label>
                                </div>
                                <span class="price-beside">(7000 VNĐ)</span>
                                </div>

                                <div class="d-f jf-b">
                                <div class="d-f g-10">
                                  <input
                                    type="checkbox"
                                    name="topping[]"
                                    class="input"
                                    value="8000"
                                  />
                                  <input
                                    type="checkbox"
                                    name="topping[]"
                                    class="input"
                                    value="0"
                                    checked
                                    hidden
                                  />
                                  <label for="">Trân châu cam</label>
                                </div>
                                <span class="price-beside">(8000 VNĐ)</span>
                                </div>


                              </div>
                            </div>
                          </div>
                        </section>
                        <div class="submit-form d-f jf-b">
                            <input type="submit"  value="Mua ngay" name="buynow"  class="submit_order detail_submit" />
                            <input type="submit"  value="Thêm vào giỏ hàng" name="addToCart" onclick="alert('Đã thêm vào giỏ hàng')" class="submit_order detail_submit" />

                        </div>
                      </form>
                </div>
            </div>
            <!-- --------------------------------Phần chọn đường đá topping---------^-------------- -->
<!-- -----------------------------Phần sản phẩm liên quan----------------v-------------- -->
            <div class="contain-product-relation">
                <h2>Sản phẩm liên quan</h2>
                <!-- ----------------------------------- -->

                <?php
                    for ($i = 0; $i < count( $product_same_category); $i++) {
                        $product_name =  $product_same_category[$i]["name"];
                        $product_price =  $product_same_category[$i]["price"];
                        $name_image =  $product_same_category[$i]["img"];
                        $image = $image_path . $name_image;
                        $id_category =   $product_same_category[$i]["id"];
                        $url_productDetail = "index.php?act=productDetail&id=$id_category&header=headerSecond";


                ?>
                <div class="product-relation d-f m-t-b10">
                    <div class="product-relation_image">
                        <a href="<?= $url_productDetail ?>">
                            <img src="<?= $image ?>" alt="">
                        </a>
                    </div>
                    <div class="product-relation_name_price">
                        <div class="product-relation_name product_name m-t-b5" style="font-size: 1.6rem;">
                           <?= $product_name ?>
                        </div>
                        <div class="product-relation_price product_price m-t-b5" style="font-size: 1.45rem;">
                            Giá : <?= number_format($product_price) ?> VNĐ
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------- -->

                <?php } ?>
                                               
            </div>
<!-- -----------------------------Phần sản phẩm liên quan-^^^----------------------------- -->
                 

        </div>

        <!-- ------------------------------Bình luận--------------------v------------------- -->
        <div class="wrapper-comment">
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

                $("#comment").load("view/comment/comment.php", {
                    id_pro: <?= $id ?>
                });

            });
        </script>
        <div id="comment" class="contain-comment ">
        

        </div>

        </div>
        






        <!-- ------------------------------Bình luận--------------------^------------------- -->
    </main>
   
    
   

  

    
