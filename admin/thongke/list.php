
<!-- List thống kê -->
<!-- <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '<tr>
                                <td>'.$madm.'</td>
                                <td>'.$tendm.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$maxprice.'</td>
                                <td>'.$minprice.'</td>
                                <td>'.$avgprice.'</td>
                            </tr>';
                    }

                ?> -->


<?php
    foreach ($listthongke as $thongke) {
        extract($thongke);
    }
    ?>
    
<div class="contain_product_user_cash d-f">
    <!-- ---------------------------------- -->

    <div class="product d-f f-d admin-block-dashboard">
    <div class="parameter d-f">
        <div>
        <div class="admin_numberProduct"><?=$countsp?></div>
        <div class="admin_textProduct">Số lượng sản phẩm</div>
        </div>
        <div class="admin_icon_product">
        <i class="fa-solid fa-cart-plus"></i>
        </div>
    </div>
    <div class="more-info info_product d-f jf-c al-c">
        More info
        <div class="admin_icon_more-info">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
    </div>
    </div>

    <!-- ---------------------------------- -->

    <div class=" d-f f-d admin-block-dashboard">
        <div class="parameter d-f admin_money">
        <div>
            <div class="admin_numberProduct">120,000,000</div>
            <div class="admin_textProduct">Tổng doanh thu</div>
        </div>
        <div class="admin_icon_product">
            <i class="fa-solid fa-money-bill"></i>
        </div>
        </div>
        <div class="more-info d-f jf-c al-c info_money">
        More info
        <div class="admin_icon_more-info">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
        </div>
    </div>

    <!-- ---------------------------------- -->
    
    <div class=" d-f f-d admin-block-dashboard">
        <div class="parameter d-f admin_user">
        <div>
            <div class="admin_numberProduct">1</div>
            <div class="admin_textProduct">Khách hàng</div>
        </div>
        <div class="admin_icon_product">
            <i class="fa-solid fa-user"></i>
        </div>
        </div>
        <div class="more-info d-f jf-c al-c info_user">
        More info
        <div class="admin_icon_more-info">
            <i class="fa-solid fa-user"></i>
        </div>
        </div>
    </div>

  <!-- ---------------------------------- -->
</div>
