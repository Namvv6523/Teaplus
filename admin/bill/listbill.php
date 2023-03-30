
               
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
                   
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>THAO TÁC</th>
                  </tr>
                </thead>
                  <tbody>
                <?php
                    foreach($listbill as $bill){
                      extract($bill);
                      $suabill="index.php?act=suabill&id=".$id;
                      $xoabill="index.php?act=xoabill&id=".$id;
                        $kh=$bill["bill_name"].'
                        <br> '.$bill["bill_address"].'
                        <br>'.$bill["bill_tel"];
                        $ttdh= getStatus($bill["bill_status"]);
                        $countsp=loadall_cart_count($bill["id"]);
                        
                        echo '<tr>
                        
                        <td>'.$bill['id'].'</td>
                        <td>'.$kh.'</td>
                        <td>'.$countsp.'</td>
                        <td><strong>'.$bill["tatal"].'</strong>VNĐ</td>
                        <td>'.$ttdh.'</td>
                        <td>'.$bill['ngaydathang'].'</td>
                        <td class="td_sp"> 
                                  <a class="url-edit" href="'. $suabill.'">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                  </a> 
                                  <a class="url-delete" href="'. $xoabill.'">
                                    <i class="fa-solid fa-trash"></i>
                                  </a> 
                                </td>
                    </tr>';
                    }

                
                
                ?>
              
                 <!-- ----------------------------- -->
                 <!-- <th>Vũ Hồng Minh </th>
                    <th>Trà Sữa </th>
                    <th><img src="" alt=""></th>
                    <th>trân châu</th>
                    <th>đường 70%+size L</th>
                    <th>43.000đ</th>
                    <th>1</th>
                    <th>43.000đ</th>
                    <th>đang giao hàng</th>
                    <th><button type="submit">Xác nhận</button> <button type="submit">Sửa</button></th> -->
                  
                   
     
                </tbody>
      
      
               </table>
               
              </form>
              </section>