<?php
    if(is_array($bill)){
        extract($bill);
      $ttdh= getStatus($bill["bill_status"]);
       var_dump($ttdh);
        
    }
?>
<main class="w-100 d-f f-d">
          <h3>Update Bill</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=updatebill" class="general-form" method="post" enctype="multipart/form-data">
              <div class="block_form d-f f-d">
                <label for="">TÌNH TRẠNG ĐƠN HÀNG</label>
                <input type="text" placeholder="Trạng Thái Đơn Hàng" name="ttdh" value="<?=$bill["bill_status"]?>">
                <!-- <select name="" id="">
                  <option value="1">dfljbgbj</option> -->
                
                <!-- <input type="text" placeholder="Tình Trạng Đơn Hàng" name="ttdh" value=""> -->
                <!-- <select name="ttdh"> -->
                    <!-- <option value=" selected>Tất cả</option> -->
                    <!-- <option value="0" selected>Tất cả</option> -->
                <?php 
                // foreach($status as $status){
                // extract($status);
                // if($ttdh==$ttdh) $s="selected"; else $s="";
                // echo ' <option value="'.$id.'" '.$s.'>'.$status.'</option>';
                //     }
                // foreach ($status as $bill) {
                //     extract($bill);
                //     echo '<option value="'.$id.'">'.$bill.'</option>';
                // }
                ?>
                <!-- </select> -->
                
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