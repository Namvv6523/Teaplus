<main class="w-100 d-f f-d al-c">


<?php
if(isset($list_bill) && is_array($list_bill)){
$id = isset($list_bill['id']) ? $list_bill['id'] : 0;
$bill_name = isset($list_bill['bill_name']) ? $list_bill['bill_name'] : "";
$bill_address = isset($list_bill['bill_address']) ? $list_bill['bill_address'] : "";
$bill_tele = isset($list_bill['bill_tel']) ? $list_bill['bill_tel'] : 0;
$payment_method = isset($list_bill['bill_pttt']) ? $list_bill['bill_pttt'] : 1;
$bill_date = isset($list_bill['ngaydathang']) ? $list_bill['ngaydathang'] : 0;
$total = isset($list_bill['tatal']) ? $list_bill['tatal'] : 0;
$status = isset($list_bill['bill_status']) ? $list_bill['bill_status'] : 0;
$note = isset($list_bill['note']) ? $list_bill['note'] : "Không có";




}

?>

               
               <h1 class="title_product_new">Sản phẩm </h1>
               <div class="product-page-banner">
                   <span class="product-page-banner_title">Trang chủ - Đơn hàng</span>
              </div>
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart w-100">
               
              <form action="detail-product.html" class="form-submit-cart w-100">         
               <table class="table-cart w-100">
      
                <thead>
                  <tr>
                    <th>Tên trà sữa</th>
                    <th>Thêm topping</th>
                    <th>Lựa chọn khác</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
      
                  </tr>
                </thead>
                <tbody>
                <?php


                    for ($i = 0; $i < count($list_cart); $i++) {
                        $image =  $list_cart[$i]['img'];
                        $product = $list_cart[$i]['name'];
                        $price = $list_cart[$i]['price'];
                        $sugar = $list_cart[$i]['sugar'];
                        $size = $list_cart[$i]['size'];
                        $ice = $list_cart[$i]['ice'];
                        $topping = $list_cart[$i]['topping'];
                        $quantity = $list_cart[$i]['soluong'];
                        $result = $list_cart[$i]['thanhtien'];
                        $toppingInfo = handleTopping($topping);
                        ?>

     
                 <!-- ----------------------------- -->
                  <tr>
                    <td> 
                       <img style="width: 20px;" src="<?= $image ?>" alt=""> 
                       <?= $product ?> (<?= handleSize($size) ?>)
                     </td>
                     <td>
                       <ul>
                       <?php for($j = 0 ; $j < count($toppingInfo);$j++){ ?>
                          <li><?= $toppingInfo[$j] ?></li>                         
                        <?php } ?>
                       </ul>
                     </td>
                     <td><?= handleIce($ice) ?> đá <?= handleSugar($sugar) ?> đường</td>
                     <td><?= number_format($price) ?>đ</td>
                     <td>
                       <div class="quantity d-f al-c jf-c">
                        
                         <div class="product_quantity"><?= $quantity ?></div>
                        
                       </div>
                     </td>
                     <td><?= number_format($result) ?>đ</td>
                     
                  </tr>
                  <?php } ?>
                 <!-- ----------------------------- -->
                   
     
                </tbody>
      
      
               </table>
               
              </form>
              </section>
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----^--------------------- -->
     
     
             <!-- ------------------ Nhập thông tin người dùng và thanh toán----------------v--------------- -->
               <section class="contain-info_user-pay w-100 ">
     
                 <!-- --------------Thông tin người dùng---------v----- -->
                 <form action="" class="w-100 d-f jf-b form-pay" style="padding-left: 15px;">
                 <div class="info_user w-45">
                     <div>
                         <span style="color: var(--primary-color);font-weight: 600;">Trạng thái đơn hàng : </span>
                         <span style="color: red" ><?= getStatus($status) ?></span>
                       </div>
                   <div>
                     
                       <a class="get-old-info" href="">
                         Cập nhật trạng thái 
                       </a>
                     
                       <!-- ------- -->
                       <div class="d-f w-100 m-t-b10">
                         <label style="width:150px" class="label_input-confirm-user label_input-info-user" for="">Tên người nhận</label>
                         <input type="text" placeholder="Tên người nhận" class="input-info" disabled name="user" value="<?= $bill_name ?>">
                       </div>
                       <!-- --------- -->
                       <!-- ------- -->
                       <div class="d-f w-100 m-t-b10">
                         <label style="width:150px" class="label_input-confirm-user label_input-info-user" for="">Số điện thoại</label>
                         <input type="text" placeholder="Số điện thoại" value="<?= $bill_tele ?>" disabled class="input-info" name="number-phone">
                       </div>
                       <!-- --------- -->
                       <!-- ------- -->
                       <div class="d-f w-100 m-t-b10">
                         <label style="width:150px" class="label_input-confirm-user label_input-info-user" for="">Địa chỉ</label>
                         <input type="text" placeholder="Địa chỉ" class="input-info" value="<?= $bill_address ?>" disabled name="address">
                       </div>
                       <!-- --------- -->
                       <!-- ------- -->
                       <div class="d-f w-100 m-t-b10">
                         <label style="width:150px" class="label_input-confirm-user label_input-info-user" for="">Ngày tạo đơn</label>
                         <input type="text" placeholder="Ghi chú thêm địa chỉ" value="<?= $bill_date ?>" disabled class="input-info" name="date">
                       </div>
                       <!-- --------- -->
                        <!-- ------- -->
                        <div class="d-f w-100 m-t-b10">
                         <label style="width:150px" class="label_input-confirm-user label_input-info-user" for="">Ghi chú</label>
                         <input type="text" placeholder="Ghi chú thêm địa chỉ" value="<?= $note ?>" disabled class="input-info" name="note">
                       </div>
                       <!-- --------- -->
                      
                   </div>
                 </div>
                 <!-- --------------Thông tin người dùng---------^----- -->
                 <!-- -------------------- Thanh toán -----------v----- -->
                 <div class="block-pay w-45">
                   <div class="payments w-100">
                     <h4>Hình thức chuyển khoản</h4>
                     <div  class="w-100">
                     <div class="m-t-b10">
                       <!-- <input type="radio" name="bank"> -->
                       <label for="">
                       <?php
                        if($payment_method == 1)echo "Trả tiền khi nhận hàng";
                        else if ($payment_method == 2)echo "Chuyển khoản ngân hàng";
                        

                    ?>
                       </label>
                     </div>
                     <!-- <div class="m-t-b10">
                       <input type="radio" name="bank">
                       <label for="">Thanh toán tiền mặt</label>
                     </div> -->
                   </div>
                   </div>
                   <ul class="w-100 block-pay_ul">
                     <li class="d-f jf-b">
                       <span style="font-weight: 600;font-size: 1.7rem;">
                         Tổng tiền giỏ hàng
                       </span>
                      
                     </li>
                     
                     <li class="d-f jf-b">
                         <span>
                           Phí vận chuyển
                         </span>
                         <span class="cash">
                           10,000đ
                         </span>
                       </li>
                     <li class="d-f jf-b">
                       <span>
                         Tổng tiền
                       </span>
                       <span class="cash">
                         <?= number_format($total) ?>
                       </span>
                     </li>
                                                             
                   </ul>
                   <div class="w-100 d-f jf-b  jf-e" style="margin-top: 2.5%;">
                                      
                       <a href="" style="display: block;" class="continue-buy delete-cart-confirm">
                        Hủy đơn hàng
                       </a>
                                                               
                   </div>
                 </div>     
     
                 <!-- -------------------- Thanh toán -----------^----- -->
     
               </form>
     
     
               </section>
                                                            
             <!-- ------------------ Nhập thông tin người dùng và thanh toán---------------^--------------- -->                                           
           </main>