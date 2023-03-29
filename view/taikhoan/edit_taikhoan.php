<?php
            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                extract($_SESSION['user']);
            }

            $hinhpath="./upload/" . $avatar;
            // var_dump($hinhuser) ;
            //   $hinhuser='<img style="width: 100px; height: auto;" src="./upload/img/user/img_user.jpg" alt="">';
          
?>

    <div class="boxtitle">Thông Tin Tài Khoản </div>

        <form action="index.php?act=thongtintk&header=headerSecond" method="post" enctype="multipart/form-data">
        
        emai :
        <input type="email" name="email" value="<?=$email?>">
         <br>
        username : 
        <input type="text" name="user" value="<?=$user?>">
         <br>
        password : 
        <input type="password" name="pass" value="<?=$pass?>"> 
        <br>
        address : 
        <input type="text" name="address" value="<?=$address?>"> 
        <br>   
         
        ảnh : <br>  
        <img  src="<?= $hinhpath ?>" alt="">
        <input type="file" name="hinh" value=""> <br>

        số điện thoại: 
        <input type="text" name="tel" value="<?=$tel?>"> 
        <br>

        <!-- <img style="width: 100px; height: auto;" src="./upload/img/user/img_user.jpg" alt="">" -->
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" value="cập nhật" name="capnhat">
        
        </form>

          <h2 class="thongbao">   <?php 
            if(isset($thongbao) && $thongbao!=""){
                echo $thongbao;
            }
            ?>
            </h2>
        </div>
    </div>

