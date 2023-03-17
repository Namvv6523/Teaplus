<main class="w-100 d-f f-d">
          <h3>Quản Lý Bình Luận</h3>
          <div class="search_list-product-admin w-100">
            <form action="" class="d-f form-search">
                <table class="w-100 table">
                    <thead>  
                       <th> ID </th>
                        <th> Nội dung </th>
                        <th> MẬT KHẨU</th>
                        <th>  Iduser</th>
                        <th>Idpro</th>
                        <th>  Ngày bình luận</th>
                        <th>Chức Năng </th>

                    </thead>
                    <?php foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        // $suabl="index.php?act=suabl&id=".$id;
                        $xoabl="index.php?act=xoabl&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $noidung . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $ngaybinhluan . '</td>
                                <td> </a> <a href="'. $xoabl.'"><input type="button" value="Xóa"></a> </td>
                                
                            </tr>';
                    }
                    // <a href="'. $suabl.'"><input type="button" value="Sửa">
                    ?>
                  </table>
            </form>
                 
          </div>
        </main>