<?php
    if(is_array($dm)){
        extract($dm);
    }
?>

<main class="w-100 d-f f-d">
          <h3 style="text-align: center;">Sửa Danh Mục</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=updatedm" method="post" enctype="multipart/form-data" class="form_sp">

              <div class="block_form d-f f-d">
                <label for="label_addsp"> Mã sản phẩm </label>
                <input class="ten_addsp" type="text" placeholder="Mã sản phẩm" name="masp" disabled>
                <div class="block_form d-f f-d">
                <label for="label_addsp"> Tên Sản Phẩm </label>
                
                <input class="ten_addsp" type="text" placeholder="Mã sản phẩm" name="tenloai" value="<?php if (isset($namedm)&&($namedm!="")) echo $namedm; ?>">
              <!-- </div>
              <div class="block_form d-f f-d">
                <label for=""> Ảnh </label>
                <input type="file" placeholder="Tên sản phẩm">
              </div>
              <div class="block_form d-f f-d">
                <label for=""> Giá sản phẩm </label>
                <input type="text" placeholder="Tên sản phẩm">
              </div>
              <div class="block_form d-f f-d">
                <label for=""> Mô tả sản phẩm </label>
                <textarea name="" id="" style="width:100%" cols="30" rows="5"></textarea>
              </div>
              <div class="block_form d-f f-d">
                <label for=""> Mô tả sản phẩm </label>
                <select name="" id="">
                    <option value="">Trà sữa trân châu</option>
                    <option value="">Trà sữa matcha</option>
                    <option value="">Trà sữa phô mai</option>
                    <option value="">Trà sữa việt quất</option>
                </select>
              </div> -->
              <div class="block_form d-f g-10 al-c">
              <input type="hidden" value="<?php if (isset($id)&&($id>0)) echo $id;?>" class="submit-general-form"  name="id">
               <input type="submit" value="Lưu" class="input_addsp"  name="capnhat">
               <input type="reset" value="Hủy" class="input_addsp">
              </div>
              <?php 
                        if(isset($thongbao)&&($thongbao)){
                            echo $thongbao;
                        }
                        
                    ?>
            </form>
          </div>
  </main>