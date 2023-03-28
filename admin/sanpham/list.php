<main class="w-100 d-f f-d">
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
    <h3>Danh sách sản phẩm</h3>
    <div class="search_list-product-admin w-100">
            <form action="" class="d-f form-search">
              <input
                type="text"
                placeholder="Tìm kiếm theo tên sản phẩm..."
                class="input-search"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
              />
            </form>  
                      
 
        <!-- Danh sách sản phẩm -->
        <table class="w-100 table">
              <thead>
                  <th>Check</th>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Ảnh</th>
                  <th>Mô tả</th>
                  <th>Like</th>
                  <th>Thời gian tạo</th>
                  <th>Thời gian sửa</th>
                  <th>Danh mục</th>
                  <th>Tạo mới</th>
              </thead>
              <tbody>
                <!-- php -->
              <?php foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp="index.php?act=suasp&id=".$id;
                        $xoasp="index.php?act=xoasp&id=".$id;
                        $hinhpath="../upload/".$img;
                        if(is_file($hinhpath)){
                            $hinh=" <img src='".$hinhpath."' width='40'>";
                            
                        }else{
                            $hinh="no photo";
                        }


                        echo '<tr>
                                <td><input type="checkbox"></td>
                                <td class="td_sp">' . $id . '</td>
                                <td class="td_sp">' . $name . '</td>
                                <td class="td_sp">' . number_format($price) . '</td>
                                <td class="td_sp">' . $hinh . '</td>
                                <td class="td_sp">' . $mota . '</td>
                                <td class="td_sp">' . $luotxem . '</td>
                                <td class="td_sp">' . $luotxem . '</td>
                                <td class="td_sp">' . $luotxem . '</td>
                                <td class="td_sp">' . $iddm . '</td>
                                <td class="td_sp"> 
                                  <a class="url-edit" href="'. $suasp.'">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                  </a> 
                                  <a class="url-delete" href="'. $xoasp.'">
                                    <i class="fa-solid fa-trash"></i>
                                  </a> 
                                </td>
                            </tr>';
                    }
                    ?>
              </tbody>
          
      
       
      </table>

      </main>