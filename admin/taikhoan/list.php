<main class="w-100 d-f f-d">
          <h3>Quản Lý Loại Hàng</h3>
          <div class="search_list-product-admin w-100">
            <form action="" class="d-f form-search" >
                <table class="w-100 table">
                    <thead>  
                       <th>  MÃ TÀI KHOẢN </th>
                       <th>Avatar</th>

                        <th> TÊN ĐĂNG NHẬP </th>
                        <th> MẬT KHẨU</th>
                        <th>  EMAIL</th>
                        <th>  ĐỊA CHỈ</th>
                        <th>  ĐIỆN THOẠI</th>
                        <th>  VAI TRÒ</th>
                        <th>Chức Năng </th>

                    </thead>
                    <?php foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                        echo '<tr>
                                
                                <td>' . $id . '</td>
                                <td>' . $avatar . '</td>
                                <td>' . $user . '</td>
                                <td>' . $pass . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>' . $tel . '</td>
                                <td>' . $role . '</td>
                                <td> <a href="'. $suatk.'"><input type="button" value="Sửa"></a> <a href="'. $xoatk.'"><input type="button" value="Xóa"></a> </td>
                            </tr>';
                    }
                    ?>
                  </table>
            </form>
                 
          </div>
        </main>