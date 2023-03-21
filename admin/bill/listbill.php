<form class="form_sp" action="index.php?act=listbill" method="post">
    DANH MỤC
        <input class="ten_addsp" type="text" name="kyw" placeholder="Nhập mã đơn hàng">
        <input class="" type="submit" name="listok" value="Tìm Kiếm">
</form>
<!-- Danh sách bình luận -->
<h1>DANH SÁCH ĐƠN HÀNG</h1> 
    <table class="table_sp">
        <thead>
        <tr>
            <th class="th_sp">MÃ ĐƠN HÀNG</th>
            <th class="th_sp">KHÁCH HÀNG</th>
            <th class="th_sp">SÔ LƯỢNG ĐẶT HÀNG</th>
            <th class="th_sp">GIÁ TRỊ ĐƠN HÀNG</th>
            <th class="th_sp">TÌNH TRẠNG ĐƠN HÀNG</th>
            <th class="th_sp">NGÀY ĐẶT HÀNG</th>
            <th class="th_sp">THAO TÁC</th>
          </tr>
          <!-- php -->
            <?php 
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $kh = $bill["bill_name"].'
                        <br>'.$bill["bill_email"].'
                        <br>'.$bill["bill_address"].'
                        <br>'.$bill["bill_tel"];
                        $ttdh = get_ttdh($bill["bill_status"]);
                        $countsp = loadall_cart_count($bill["id"]);
                        
                        echo '<tr>
                                <td class="td_sp">DAM-' .$bill['id']. '</td>
                                <td class="td_sp">' .$kh. '</td>
                                <td class="td_sp">' .$countsp. '</td>
                                <td class="td_sp"><strong>'. $bill['total'] . '</strong></td>
                                <td class="td_sp">' .$bill. '</td>
                                <td class="td_sp">' .$ttdh. '</td>
                                <td class="td_sp">' .$bill['ngaydathang']. '</td>
                                <td class="td_sp"> 
                                    <input type="button" value="Sửa">
                                    <input type="button" value="Xóa">
                                </td>
                                
                            </tr>';
                    }
                    ?>

                    <tr>DAM-2</th>
                        <td class="td_sp">
                            Trần Nguyên Anh
                            <br> anhtnph23799@fpt.edu.vn
                            <br> Xuy Xá - Mỹ Đức - Hà Nội
                            <br> 0866868301
                        </td>
                        <td class="td_sp"><strong>25000</strong>VNĐ</td>
                        <td class="td_sp">Đơn hàng mới</td>
                        <td class="td_sp">
                            <input type="button" value="Sửa">
                            <input type="button" value="Xóa">
                        </td>
                    </tr>

          <!-- <tr>
            <th class="th_sp">MÃ LOẠI</th>
            <th class="th_sp">TÊN SẢN PHẨM</th>
            <th class="th_sp">GIÁ</th>
            <th class="th_sp">HÌNH</th>
            <th class="th_sp">SỐ LƯỢNG</th>
            <th class="th_sp">LƯỢT XEM</th>
            <th class="th_sp">HÀNH ĐỘNG</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="td_sp">1</td>
            <td class="td_sp">Áo phông nam</td>
            <td class="td_sp">200.000đ</td>
            <td class="td_sp"><img src="../upload/img/logo/logo.jpg" alt="" style="width: 50px; height: 50px;"></td>
            <td class="td_sp">10</td>
            <td class="td_sp">98</td>
            <td class="td_sp">
              <a href="#">Sửa</a> / <a href="#">Xóa</a>
            </td>
          </tr>
          <tr>
            <td class="td_sp">1</td>
            <td class="td_sp">Áo phông nam</td>
            <td class="td_sp">200.000đ</td>
            <td class="td_sp"><img src="../upload/img/logo/logo.jpg" alt="" style="width: 50px; height: 50px;"></td>
            <td class="td_sp">10</td>
            <td class="td_sp">98</td>
            <td class="td_sp">
              <a href="#">Sửa</a> / <a href="#">Xóa</a>
            </td>
          </tr>
          <tr>
            <td class="td_sp">1</td>
            <td class="td_sp">Áo phông nam</td>
            <td class="td_sp">200.000đ</td>
            <td class="td_sp"><img src="../upload/img/logo/logo.jpg" alt="" style="width: 50px; height: 50px;"></td>
            <td class="td_sp">10</td>
            <td class="td_sp">98</td>
            <td class="td_sp">
              <a href="#">Sửa</a> / <a href="#">Xóa</a>
            </td>
          </tr> -->
        </tbody>
      </table>