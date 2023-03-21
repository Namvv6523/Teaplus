    
    <form class="form_sp" action="index.php?act=listsp" method="post">
    DANH MỤC
        <input class="ten_addsp" type="text" name="kyw">
        <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php 
                foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                echo ' <option value="'.$id.'">'.$name.'</option>';
                }
            ?>
        </select>
        <input class="" type="submit" name="listok" value="Tìm Kiếm">
    </form>
 
        <!-- Danh sách sản phẩm -->
    <table class="table_sp">
        <thead>
        <tr>
            <th class="th_sp">MÃ LOẠI</th>
            <th class="th_sp">TÊN SẢN PHẨM</th>
            <th class="th_sp">GIÁ</th>
            <th class="th_sp">HÌNH</th>
            <th class="th_sp">MÔ TẢ</th>
            <th class="th_sp">LƯỢT XEM</th>
            <th class="th_sp">HÀNH ĐỘNG</th>
          </tr>
          <!-- php -->
        <?php foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp="index.php?act=suasp&id=".$id;
                        $xoasp="index.php?act=xoasp&id=".$id;
                        $hinhpath="../upload/img/product/".$img;
                        if(is_file($hinhpath)){
                            $hinh=" <img src='".$hinhpath."' height='80' width='60'>";
                        }else{
                            $hinh="no photo";
                        }


                        echo '<tr>
                                <td class="td_sp">' . $id . '</td>
                                <td class="td_sp">' . $name . '</td>
                                <td class="td_sp">' . $price . '</td>
                                <td class="td_sp">' . $hinh . '</td>
                                <td class="td_sp">' . $mota . '</td>
                                <td class="td_sp">' . $luotxem . '</td>
                                <td class="td_sp"> <a claas="sua" href="'. $suasp.'"><input type="button" value="Sửa"></a> <a claas="xoa" href="'. $xoasp.'"><input type="button" value="Xóa"></a> </td>
                            </tr>';
                    }
                    ?>
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