
<!-- Form tạo sản phẩm mới -->
<h1>THÊM MỚI SẢN PHẨM</h1>
<form class="form_sp" action="index.php?act=addsp" method="post" enctype="multipart/form-data">
      <label class="label_addsp" for="">Danh mục</label>
      <select name="iddm">
        <?php
          foreach ($listdanhmuc as $danhmuc ) {
              extract($danhmuc);
              echo '<option value="'.$id.'">'.$name.'</option>';
          }
        ?>
        
      </select>

      <label class="label_addsp" for="">Tên sản phẩm</label>
      <input class="ten_addsp" type="text" name="tensp" />

      <label class="label_addsp" for="">Giá</label>
      <input class="ten_addsp" type="text" name="giasp" />

      <label class="label_addsp" for="">Hình</label>
      <input class="ten_addsp" type="file" name="hinh" />

      <label class="label_addsp" for="">Mô tả</label>
      <textarea name="mota" id="" cols="30" rows="10"></textarea> <br>

      <input class="input_addsp" type="submit" name="themmoi" value="THÊM MỚI">
      <input class="input_addsp" type="reset" value="NHẬP LẠI">
      <a href="index.php?act=listsp"><input class="input_addsp" type="button" value="DANH SÁCH" /></a>

      <?php
        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
      ?>

</form>
