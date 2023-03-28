
               
               <h1 class="title_product_new">Sản phẩm </h1>
               <div class="product-page-banner">
                   <span class="product-page-banner_title">Trang chủ - Đơn hàng</span>
              </div>
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart w-100">
               
              <form action="index.php?act=listbill" class="form-submit-cart w-100">         
               <table class="table-cart w-100">
      
                <thead>
                  <tr>
                    <th>Tên khách hàng </th>
                    <th>Tên trà sữa</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>trạng thái</th>
                    <th>thao tác</th>
                  </tr>
                </thead>
                <?php
                    foreach($listbill as $bill){
                        extract($bill);
                        

                    }

                
                
                ?>
                <tbody>
                 <!-- ----------------------------- -->
                 <th>Vũ Hồng Minh </th>
                    <th>Trà Sữa </th>
                    <th><img src="" alt=""></th>
                    <th>trân châu</th>
                    <th>đường 70%+size L</th>
                    <th>43.000đ</th>
                    <th>1</th>
                    <th>43.000đ</th>
                    <th>đang giao hàng</th>
                    <th><button type="submit">Xác nhận</button> <button type="submit">Sửa</button></th>
                  
                   
     
                </tbody>
      
      
               </table>
               
              </form>
              </section>