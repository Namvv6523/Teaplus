<?php
    if(is_array($taikhoan)){
        extract($taikhoan);
    }
    $hinhpath="../upload/img/avatar/".$avatar;
          if(is_file($hinhpath)){
            $avatar=" <img src='".$hinhpath."' height='80' width='60'>";
          }else{
            $avatar="no photo";
          }

?>
<main class="w-100 d-f f-d">
          <h3>Thêm tài khoản</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=addtk" class="general-form" method="post" enctype="multipart/form-data">
              <label class="label_addsp" for="">Avatar</label>
               <input class="ten_addsp" type="file" name="hinh" /> <?=$avatar?>
              <div class="block_form d-f f-d">
                <label for=""> TÊN ĐĂNG NHẬP  </label>
                <input type="text" placeholder="Tên Đang Nhập" name="tentk"  value="<?=$user?>"> 
              </div>
              <div class="block_form d-f f-d">
                <label for="">MẬT KHẨU</label>
                <input type="password" placeholder="MẬT KHẨU" name="matkhau" value="<?=$pass?>">
              </div>
              <div class="block_form d-f f-d">
                <label for="">EMAIL</label>
                <input type="text" placeholder="Email" name="email" value="<?=$email?>">
              </div>
              <div class="block_form d-f f-d">
                <label for="">ĐỊA CHỈ	</label>
                <input type="text" placeholder="Địa Chỉ" name="diachi" value="<?=$address?>">
              </div><div class="block_form d-f f-d">
                <label for="">Điện Thoại</label>
                <input type="text" placeholder="Điên Thoại" name="dienthoai" value="<?=$tel?>">
              </div><div class="block_form d-f f-d">
                <label for="">Vai Trò</label>
                <input type="text" placeholder="Vai Trò" name="vaitro" value="<?=$role?>">
              </div>
              <div class="block_form d-f g-10 al-c">
              <input type="hidden" name="id" value="<?=$id?>">
               <input type="submit" value="Cập Nhập" class="submit-general-form" name="capnhap">
               <input type="reset" value="Hủy" class="cancel-general-form" >
               <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
              </div>
              <?php 
                        if(isset($thongbao)&&($thongbao)){
                            echo $thongbao;
                        }
                        
                    ?>
            </form>
          </div>
</main>