<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    
          $idProduct = $id;
          $nameProduct = $name;
          $priceProduct = $price;
          $imgProduct = $img;
          $motaProduct = $mota;

          $hinhpath="../upload/".$imgProduct;
          if(is_file($hinhpath)){
            $hinh=" <img src='".$hinhpath."'  width='60'>";
          }else{
            $hinh="no photo";
          }
?>
<h1>CẬP NHẬP SẢN PHẨM</h1>
<form class="form_sp" action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <!-- <label class="label_addsp" for="">Mã sản phẩm:</label>
      <input class="ten_addsp" type="text" name="masp" /> -->
      <select name="iddm">
            <option value="0" selected>Tất cả</option>
            <?php 
                foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                if($iddm==$id) $s="selected"; else $s="";
                echo ' <option value="'.$id.'" '.$s.'>'.$name.'</option>';
              }
            ?>
      </select>

      <label class="label_addsp" for="">Tên sản phẩm</label>
      <input class="ten_addsp" type="text" name="tensp" value="<?=$nameProduct?>" />
      
      <label class="label_addsp" for="">Giá</label>
      <input class="ten_addsp" type="text" name="giasp" value="<?=$priceProduct?>" />

      <label class="label_addsp" for="">Hình</label>
      <input class="ten_addsp" type="file" name="hinh" />
      <?=$hinh?>

      <label class="label_addsp" for="">Mô tả</label>
      <textarea name="mota" cols="30" rows="10"> <?=$motaProduct?> </textarea> <br>

      <input type="hidden" name="id" value="<?=$idProduct?>">
      <input class="input_addsp" type="submit" name="capnhat" value="CẬP NHẬT">
      
      <input class="input_addsp" type="reset" value="NHẬP LẠI">
      <a href="index.php?act=listsp"><input class="input_addsp" type="button" value="DANH SÁCH" /></a>

      <?php
        if(isset($thongbao)&&($thongbao!="")){
          echo $thongbao;
        }
          
      ?>

</form>