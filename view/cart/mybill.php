<main class="w-100 d-f f-d al-c">

    <h1 class="title_product_new">Sản phẩm </h1>
    <div class="product-page-banner">
        <span class="product-page-banner_title">Trang chủ - Đơn hàng</span>
    </div>
    <?php
    if (isset($_SESSION['user'])) {
        $info_user = $_SESSION['user']['user'];
        $info_email = $_SESSION['user']['email'];
        $info_address = $_SESSION['user']['address'];
        $info_tele = $_SESSION['user']['tel'];
    } else {
        $info_user = "";
        $info_email = "";
        $info_address = "";
        $info_tele = 0;
    }

    ?>


    <?php
    if (is_array($list_bill) && $list_bill != null) {


        for ($i = 0; $i < count($list_bill); $i++) {

            $id_bill =  $list_bill[$i]['id'];
            $bill_pttt =  $list_bill[$i]['bill_pttt'];
            $bill_name =   $list_bill[$i]['bill_name'];
            $bill_address =   $list_bill[$i]['bill_address'];
            $bill_tel =   $list_bill[$i]['bill_tel'];
            $ngaydathang =   $list_bill[$i]['ngaydathang'];
            $tatal =   $list_bill[$i]['tatal'];
            $bill_status =   $list_bill[$i]['bill_status'];
            $list_cart = select_cart_idBill($id_bill);









    ?>
            <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
            <form action="index.php?act=changeStatusBill&header=headerSecond" method="POST"  class="w-100 d-f f-d form-my-bill"  >
                <section class="contain-form-submit-cart w-100">
                    

                    <div class="form-submit-cart w-100" >
                    <h3 class="bill_id">Mã đơn hàng : <?= $id_bill ?></h3>
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

                                $totalSum = 0;
                                
                                    $id = $list_cart[0]['id'];
                                    $image =  $list_cart[0]['img'];
                                    $product =  $list_cart[0]['name'];
                                    $price =  $list_cart[0]['price'];
                                    $sugar =  $list_cart[0]['sugar'];
                                    $size =  $list_cart[0]['size'];
                                    $ice =  $list_cart[0]['ice'];
                                    $topping =  $list_cart[0]['topping'];
                                    $quantity =  $list_cart[0]['soluong'];
                                    $total =  $list_cart[0]['thanhtien'];
                                    $totalSum += $total;
                                    $billTotal = $totalSum + 10000;

                                    $result = [($price + floatval($sugar) + floatval($size) + floatval($ice) + floatval($topping)) * floatval($quantity)];

                                    $toppingInfo = handleTopping($topping);
                                   

                                ?>

                                    <!-- ----------------------------- -->
                                    <tr>
                                        <td>
                                            <img style="width: 20px;" src="<?= $image  ?>" alt="">
                                            <?= $product ?> (<?= handleSize($size) ?>)
                                        </td>
                                        <td>
                                            <ul>
                                                <?php for ($u = 0; $u < count($toppingInfo); $u++) { ?>
                                                    <li><?= $toppingInfo[$u] ?></li>
                                                <?php } ?>
                                            </ul>
                                        </td>
                                        <td><?= handleSugar($sugar) ?> đường <?= handleIce($ice) ?> đá</td>
                                        <td><?= number_format($price) ?>đ</td>
                                        <td>
                                            <div class="quantity d-f al-c jf-c">

                                                <div class="product_quantity"><?= $quantity ?></div>
                                               


                                            </div>
                                        </td>
                                        <td class="totalCash">
                                            <?= number_format($result[0])  ?>đ
                                        </td>
                                        <input type="text" hidden name="totalCash[]" style="width:60px" value="<?= $result[0] ?>">
                                       
                                        <input type="text" hidden name="giohang_id[]" value="<?= $id ?>">

                                    </tr>
                                
                                <!-- ----------------------------- -->


                            </tbody>


                        </table>
                        <div class="w-100 d-f jf-b m-t-b10">

                            <!-- <button>
                   <a href="index.php" class="continue-buy" style="padding: 10px 20px;display:block">
                     Tiếp tục mua hàng
                   </a>
                 </button> -->


                        </div>
                    </div>
                </section>
                <!-- ----------------------------------- Form hiển thị giỏ hàng ----^--------------------- -->


                <!-- ------------------ Nhập thông tin người dùng và thanh toán----------------v--------------- -->
                <section class="contain-info_user-pay w-100 ">

                    <!-- --------------Thông tin người dùng---------v----- -->
                    <div class="d-f jf-b w-100">
                        <div class="info_user w-45">
                            <h4>Thông tin mua hàng</h4>
                            <div>
                            <div class="info_user w-100 d-f">
                                <div class="d-f w-100">
                                    <span style="color: var(--primary-color);font-weight: 600;">Trạng thái đơn hàng : </span>
                                    <span style="color: red" ><?= getStatus($bill_status) ?></span>
                                </div>                                                                   
                               
                            </div>
                           



                                <!-- ------- -->
                                <div class="d-f w-100 m-t-b10">
                                    <label class="label_input-info-user" for=""><i class="fa-solid fa-user"></i></label>
                                    <input type="text" placeholder="Tên người nhận" class="input-info" disabled name="user" value="<?= $bill_name ?>">
                                </div>
                                <!-- --------- -->
                                <!-- ------- -->
                                <div class="d-f w-100 m-t-b10">
                                    <label class="label_input-info-user" for=""><i class="fa-solid fa-phone"></i></label>
                                    <input type="text" placeholder="Số điện thoại" class="input-info" disabled name="number-phone" value="<?= $bill_tel ?>">
                                </div>
                                <!-- --------- -->
                                <!-- ------- -->
                                <div class="d-f w-100 m-t-b10">
                                    <label class="label_input-info-user" for=""><i class="fa-solid fa-location-dot"></i></label>
                                    <input type="text" placeholder="Địa chỉ" class="input-info" disabled name="address" value="<?= $bill_address ?>">
                                </div>
                                <!-- --------- -->
                                <!-- ------- -->
                                <div class="d-f w-100 m-t-b10">
                                    <label class="label_input-info-user" for=""><i class="fa-solid fa-calendar-days"></i></label>
                                    <input type="text" placeholder="Địa chỉ" class="input-info" name="address" disabled value="<?= $ngaydathang ?>">
                                </div>
                                <!-- --------- -->
                                <!-- ------- -->
                                <div class="d-f w-100 m-t-b10">
                                    <label class="label_input-info-user" for="">
                                        <i class="fa-regular fa-clipboard"></i>
                                    </label>
                                    <input type="text" placeholder="Ghi chú thêm địa chỉ" class="input-info" name="note" disabled>
                                </div>
                                <!-- --------- -->

                                <span class="note" style="color:red">
                                    Note : 3 trường đầu không được để trống
                                </span>

                            </div>
                        </div>
                        <!-- --------------Thông tin người dùng---------^----- -->
                        <!-- -------------------- Thanh toán -----------v----- -->
                        <div class="block-pay w-45">
                            <div class="payments w-100">
                                <h4>Hình thức chuyển khoản</h4>
                                <div class="w-100">
                                    <!-- <div class="m-t-b10">
                       <input type="radio" name="credit" value="1" checked>
                       <label for="">Chuyển khoản ngân hàng</label>
                     </div> -->
                                    <div class="m-t-b10">
                                        <label for="">
                                            <?php
                                            if ($bill_pttt == 1) echo "Trả tiền khi nhận hàng";
                                            else if ($bill_pttt == 2) echo "Chuyển khoản ngân hàng";


                                            ?>
                                        </label>
                                    </div>
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
                                        Tổng tiền
                                    </span>
                                    <span class="cash">
                                        <?= number_format($tatal) ?>đ
                                        <input hidden type="text" value="<?= $billTotal ?>" name="total">
                                    </span>
                                </li>
                                
                              

                            </ul>
                            <div class="w-100 d-f jf-b  " style="margin-top: 3.5%;">
                                    <input type="submit" value="Đã nhận được hàng " class="continue-buy receive-product" >    
                                    <input type="text" value="<?= $id_bill ?>" hidden name="idBill">                           
                                    <input type="submit" value="Hủy đơn hàng" name="cancelCart" class="delete-cart-confirm continue-buy" >
                                                                              
                            </div>
                        </div>
                    </div>


                    <!-- -------------------- Thanh toán -----------^----- -->


                </section>
            </form>

    <?php }
    } else{ ?>

   <h1 style="margin-top: 20px;">Không có đơn hàng nào</h1>
<?php } ?>




    <!-- ------------------ Nhập thông tin người dùng và thanh toán---------------^--------------- -->

</main>
<script type="module" src="JavaScript/cart.js"></script>