<main class="w-100 d-f f-d al-c" style="background-color:#f3f3f3 ;">

               <!-- <h1 class="title_product_new">Sản phẩm </h1> -->
               <div class="product-page-banner">
                   <span class="product-page-banner_title">Trang chủ - Đơn đã mua</span>
              </div>
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart contain-cart-bought w-100"> 
              <?php
    if (is_array($list_cartBought) && $list_cartBought != null) {


        for ($i = 0; $i < count($list_cartBought); $i++) {

            $id_bill =  $list_cartBought[$i]['id'];
            $bill_pttt =  $list_cartBought[$i]['bill_pttt'];
            $bill_name =   $list_cartBought[$i]['bill_name'];
            $bill_address =   $list_cartBought[$i]['bill_address'];
            $bill_tel =   $list_cartBought[$i]['bill_tel'];
            $ngaydathang =   $list_cartBought[$i]['ngaydathang'];
            $tatal =   $list_cartBought[$i]['tatal'];
            $bill_status =   $list_cartBought[$i]['bill_status'];
            $list_cart = select_cart_idBill($id_bill);
          

    ?>
                <form action="index.php?act=rebuy&header=headerSecond&f=1" method="POST">            
              <div class="block-cartBought">
                <div class="confirm-title d-f al-c">
                   <div class="title-cart-bought">
                   <i class="fa-solid fa-truck-fast"></i>
                    Đơn hàng đã được giao thành công
                   </div>
                   <div class="wall">                    
                   </div>
                   
                   <div class="impression"><i class="fa-solid fa-calendar-days"></i> 
                       <span ><?= $ngaydathang ?></span>
                    </div>
                   <div class="wall">                    
                   </div>
                   <div class="impression"><i class="fa-solid fa-credit-card"></i> 
                        <span > 
                            <?php
                            if($bill_pttt == 1)echo "Chuyển khoản ngân hàng";
                            else if ($bill_pttt == 2)echo "Trả tiền khi nhận hàng ";                        
                            ?> 
                        </span>
                    </div>
                   <div class="wall">                    
                   </div>
                   <div class="complete">Mã đơn hàng : <?= $id_bill ?></div>
                </div>
                <!-- --------------------------------------------------- -->
                <?php for($j = 0 ; $j < count($list_cart);$j++){ 
                    $id = $list_cart[$j]['id'];
                    $idpro = $list_cart[$j]['idpro'];
                    $id_giohang = $list_cart[$j]['id_giohang'];
                    $image =  $list_cart[$j]['img'];
                    $product =  $list_cart[$j]['name'];
                    $price =  $list_cart[$j]['price'];
                    $sugar =  $list_cart[$j]['sugar'];
                    $size =  $list_cart[$j]['size'];
                    $ice =  $list_cart[$j]['ice'];
                    $topping =  $list_cart[$j]['topping'];
                    $quantity =  $list_cart[$j]['soluong'];
                    $total =  $list_cart[$j]['thanhtien'];
                    $result = [($price + floatval($sugar) + floatval($size) + floatval($ice) + floatval($topping)) * floatval($quantity)];
                    $toppingInfo = handleTopping($topping);
                    $id_category = loadall_product_byProduct($idpro);                    
                    $name_cate = load_danhmuc_by_id($id_category[0]['iddm']);
                                        
                    ?>
                <div class="confirm-title info-product-cart-bought d-f jf-b">
                    <input type="text" hidden name="idGioHang[]" value="<?= $id_giohang ?>">
                    <div class="d-f">
                    <div class="img-product-cart-bought">
                        <img width="100px" src="<?= $image ?>" alt="">
                    </div>
                    <div class="name-category-product-cart-bought">
                        <div class="name-product-cart-bought">
                            <?= $product ?>
                        </div>
                        <div class="category-product-cart-bought">
                            Phân loại hàng: <?=  $name_cate[0]['name'] ?>
                        </div>
                        <div class="quantity-product-cart-bought">x <?=  $quantity ?></div>
                    </div>
                    </div>
                    <div class="price-product-cart-bought d-f al-c">
                       <?= number_format($total) ?>đ
                    </div>
                   
                   
                </div>
                <?php } ?>
                <!-- --------------------------------------- -->
                <div class="confirm-title info-product-cart-bought total-cart-bought d-f  f-d">
                    <div class="total-product-cart-bought">
                        <i class="fa-solid fa-money-bill" style="color: var(--primary-color)"></i> Thành tiền:          
                        <span class="total-sum-cart-bought"><?= number_format($tatal) ?>đ</span>
                    </div>
                  <input type="submit" value="Mua lại" class="submit-cart-bought" name="rebuy">
                   
                   
                </div>

              </div>
              </form>  
              <?php } }?>
              </section>
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----^--------------------- -->

              </main>   
    <script type="module" src="JavaScript/cart.js"></script>
