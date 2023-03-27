

<main class="w-100 d-f f-d al-c">
               
               <h1 class="title_product_new">Sản phẩm </h1>
               <div class="product-page-banner">
                   <span class="product-page-banner_title">Trang chủ - Sản phẩm</span>
              </div>
                 
             
              
                     <!-- --------------------------Phần lọc sản phẩm----------v--------------- -->
     
             <div class="contain_sideBar-filter_list-product w-100 d-f al-t">
                 <div class="side-bar_filter-product">
                  <!--  -->
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
                     <div class="w-100 block-filter">
                         <label for="" class="label-filter">Khoảng giá</label>
                         
                            <form action="" class="d-f w-100 filter-price m-t-b10 f-d">
                             <div class="m-t-b10 d-f jf-b">
                                 <input type="text" placeholder="Từ" >
                                 <input type="text" placeholder="Đến">
                             </div>
                             <input type="submit" value="Tìm kiếm">
     
                            </form>
     
                         
                     </div>
                     <div class="w-100">
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
                         
                     </div>
                 </div>
                 <!-- --------------------------Phần lọc sản phẩm----------^--------------- -->
     
     
                 <!-- ------------------------------Phần sản phẩm--------------v----------------        -->
     
             <div class="contain-product-page d-f">
                 <!-- ---------------------------------- -->
                 <div class="product d-f f-d al-c">
                   <div class="product-img w-100">
                     <a href="#">
                       <img src="./img/product/ts1.jpg" alt="" />
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
                     <div class="product_name">Trà sữa trân châu </div>
                     <div class="product_price">25,000 VNĐ</div>
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
       
                 <!-- ---------------------------------- -->
                 <div class="product d-f f-d al-c">
                   <div class="product-img w-100">
                     <a href="#">
                       <img src="./img/product/ts1.jpg" alt="" />
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
                     <div class="product_name">Trà sữa trân châu </div>
                     <div class="product_price">25,000 VNĐ</div>
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
                 <!-- ---------------------------------- -->
                 <div class="product d-f f-d al-c">
                   <div class="product-img w-100">
                     <a href="#">
                       <img src="./img/product/ts1.jpg" alt="" />
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
                     <div class="product_name">Trà sữa trân châu </div>
                     <div class="product_price">25,000 VNĐ</div>
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
                 <!-- ---------------------------------- -->
                 <div class="product d-f f-d al-c">
                   <div class="product-img w-100">
                     <a href="#">
                       <img src="./img/product/ts1.jpg" alt="" />
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
                     <div class="product_name">Trà sữa trân châu </div>
                     <div class="product_price">25,000 VNĐ</div>
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
       
               </div>
     <!-- ------------------------------Phần sản phẩm--------------^----------------        -->
             </div>
             
     
     
     
           </main>