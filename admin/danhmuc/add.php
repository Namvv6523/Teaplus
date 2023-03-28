<main class="w-100 d-f f-d">
          <h3 style="text-align: center;">Thêm loại Hàng</h3>
          <div class="form_sp">
            <form action="index.php?act=adddm" class="general-form" method="post">

              <div class="block_form d-f f-d">
                <label for="label_addsp"> Mã Loại </label>
                <input class="ten_addsp" type="text" placeholder="Mã Loại" name="maloai" disabled>
              </div>
              <div class="block_form d-f f-d">
                <label for="label_addsp"> Tên Loại </label>
                <input class="ten_addsp" type="text" placeholder="Tên loại" name="tenloai">
              </div>
              <div class="block_form d-f g-10 al-c">
               <input type="submit" value="Thêm Mới" class="input_addsp" name="themmoi">
               <input type="reset" value="Hủy" class="input_addsp" >
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