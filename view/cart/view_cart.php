<main class="w-100 d-f f-d al-c">
               
               <h1 class="title_product_new">Sản phẩm </h1>
               <div class="product-page-banner">
                   <span class="product-page-banner_title">Trang chủ - Giỏ hàng</span>
              </div>
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart w-100">
               
              <form action="index.php?act=upgradeGiohang&header=headerSecond&f=1" class="form-submit-cart w-100" method="POST">         
               <table class="table-cart w-100">
      
                <thead>
                  <tr>
                    <th>Tên trà sữa</th>
                    <th>Thêm topping</th>
                    <th>Lựa chọn khác</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
      
                  </tr>
                </thead>
                <tbody>

                <?php

                $total = 0;
                for ($i = 0; $i < count($cart_result); $i++) {
                    $id =  $cart_result[$i]['id'] ;
                    $idsp =  $cart_result[$i]['idsp'] ;
                    $image =   $cart_result[$i]['image'] ;
                    $product =   $cart_result[$i]['tensp']  ;
                    $price =   $cart_result[$i]['gia']  ;
                    $sugar =   $cart_result[$i]['sugar'] ;
                    $size =   $cart_result[$i]['size'] ;
                    $ice =   $cart_result[$i]['ice']  ;
                    $topping =   $cart_result[$i]['topping']  ;
                    $quantity =   $cart_result[$i]['soluong'] ;
                    $total =   $cart_result[$i]['thanhtien'] ;

                    $totalTopping = 0;
                    
                    $result = [($price + floatval($sugar) + floatval($size) + floatval($ice) + floatval($topping)) * floatval($quantity)];
                    $toppingInfo = handleTopping($topping);
                    
                    $url_delete = "index.php?act=delete_cart&id_Cart=$id&header=headerSecond";



                    ?>
     
                 <!-- ----------------------------- -->
                  <tr>
                    <td> 
                       <img style="width: 20px;" src="<?=   $image  ?>" alt=""> 
                       <?= $product ?> (<?= handleSize($size) ?>)
                     </td>
                     <td>
                       <ul>
                        <?php for($j = 0 ; $j < count($toppingInfo);$j++){ ?>
                          <li><?= $toppingInfo[$j] ?></li>                         
                        <?php } ?>
                       </ul>
                     </td>
                     <td><?= handleSugar($sugar) ?> đường <?= handleIce($ice) ?> đá</td>
                     <td><?= number_format($price) ?>đ</td>
                     <td>
                       <div class="quantity d-f al-c jf-c">
                         <div class="subtract circle_border">
                           <i style="margin-left: 1px;" class="fa-solid fa-minus"></i>
                         </div>
                         <div class="product_quantity"><?= $quantity ?></div>
                         <input style="width:30px" type="number" name="quantity1[]" hidden value="<?= $quantity ?>">
                         <input type="text" hidden name="giohang_id[]" value="<?= $id ?>">
                         <div class="add circle_border">
                           <i style="margin-left: 1px;" class="fa-solid fa-plus"></i>
                         </div>
                       </div>
                     </td>
                     <td class="totalCash">
                      <?= number_format($result[0])  ?>đ
                    </td>
                    <input type="text" hidden name="totalCash[]" style="width:60px" value="<?= $result[0] ?>">
                    <input type="text" hidden name="sugar" style="width:60px" value="<?= $sugar ?>">
                    <input type="text" hidden name="size" style="width:60px" value="<?= $size ?>">
                    <input type="text" hidden name="toppping" style="width:60px" value="<?= $topping ?>">
                    <input type="text" hidden name="price" style="width:60px" value="<?= $price ?>">
                     <td>
                     <a href="<?= $url_delete ?>">Xóa</a>
                     </td>
                  </tr>
                  <?php } ?>
                 <!-- ----------------------------- -->
                  
     
                </tbody>
      
      
               </table>
               <div class="w-100 d-f jf-b m-t-b10">
                 
                 <button>
                   <a href="index.php" class="continue-buy">
                     Tiếp tục mua hàng
                   </a>
                 </button>
                 
                  <?php
                  $_SESSION['check'] = "hello";
                  
                  ?>
                   <?php
                    $rand=rand();
                    $_SESSION['rand']=$rand;
                    ?>
                    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
                 <!-- <button>
                   <a href="index.php?act=orderCart&header=headerSecond&rand="  class="continue-buy">
                     Thanh toán
                   </a>
                 </button> -->
                 <input type="submit" value="Thanh toán" name="orderCart" style="padding: 0px 10px;font-size:1.7rem">
                 
                 <div class="contain-upgrade-cart ">
                   <i class="fa-solid fa-spinner rotate-upgrade-cart"></i>
     
                   <input type="submit" value="Cập nhật giỏ hàng" class="upgrade-cart" name="upgrade_giohang">
                 </div>
                 
               </div>
              </form>
              </section>
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----^--------------------- -->

              </main>   
    <script type="module" src="JavaScript/cart.js"></script>
