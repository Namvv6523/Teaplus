
 <div class="row">
    <div class="row formtitle ">
        <h1>THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
    </div>
    <div class="row formcontent">
        <div class="row  formdsloai ">
            <table class="table_sp">
                <tr class="maloai">
                    <th class="th_sp">MÃ DANH MỤC</th>
                    <th class="th_sp">TÊN DANH MỤC</th>
                    <th class="th_sp">SỐ LƯỢNG</th>
                    <th class="th_sp">GIÁ CAO NHẤT</th>
                    <th class="th_sp">GIÁ THẤP NHẤT</th>
                    <th class="th_sp">GIÁ TRUNG BÌNH</th>
                    <th class="th_sp">KHÁCH HÀNG</th>
                    <th class="th_sp">TỔNG TIỀN</th>
                </tr>
                <?php
                    foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '<tr>
                                <td class="td_sp">'.$madm.'</td>
                                <td class="td_sp">'.$tendm.'</td>
                                <td class="td_sp">'.$countsp.'</td>
                                <td class="td_sp">'.$maxprice.'</td>
                                <td class="td_sp">'.$minprice.'</td>
                                <td class="td_sp">'.$avgprice.'</td>
                                <td class="td_sp">'.$counttk.'</td>
                                <td class="td_sp">'.$sumprice.'</td>
                            </tr>';
                    }

                ?>    

                
               
            </table>
        </div>
        
    </div>
</div> 
