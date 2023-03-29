<?php
            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                extract($_SESSION['user']);
            }

            $hinhpath="./upload/" . $avatar;
            // var_dump($hinhuser) ;
            //   $hinhuser='<img style="width: 100px; height: auto;" src="./upload/img/user/img_user.jpg" alt="">';
          
?>

    <div class="divv">
        <div class="boxtraii">

        </div>
        <!--  -->
        <div class="boxphaii">
            <div class="title-profilee">
                <p  class="p_titlee">Hồ Sơ Của Tôi</p>
                <p  class="p22">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </div>
            <br>
            <hr>
            <h2 class="titlee" style="text-align: center;">Thông tin tài khoản</h2>
           <!-- <form class="form-userr" action=""> -->
           <form class="form-userr" action="index.php?act=thongtintk&header=headerSecond" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden"> -->
        <input type="hidden" name="pass" value="<?=$pass?>"> 
        <input type="hidden" name="id" value="<?=$id?>">
        <input class="input-userr" type="hidden" name="user" value="<?=$user?>">
            
               <div class="img-user-main">
                <h3>Ảnh Đại Diện</h3>
                   <!-- <img class="img-userr" src="upload/img_user.jpg" alt=""> <br> -->
                   <!-- <input type="file" name="" id=""> -->
           <img class="img-userr" src="<?= $hinhpath ?>" alt=""> <br>
           <input type="file" name="hinh" value="<?=$avatar?>" required> 

               </div>
            <table class="tablee">
                <tr>
                    <td class="title-rightt">Tên đăng nhập: </td>
                    <!-- <td><input class="input-userr" type="text" value="quang123" disabled></td> -->
                    <td>
                        <input class="input-userr" type="text"  value="<?=$user?>" disabled>
                    </td>

                </tr>
                <tr>
                    <td class="title-rightt">Email: </td>
                    <!-- <td><input class="input-userr" type="email" value="email@email.com" ></td> -->
                    <td>
                        <input class="input-userr" type="email" name="email" value="<?=$email?>">
                    </td>
                </tr>
                <tr>
                    <td class="title-rightt">Địa chỉ:</td>
                    <!-- <td><input class="input-userr" type="text" value="addressssss"></td> -->
                    <td>
                        <input class="input-userr" type="text" name="address" value="<?=$address?>"> 
                    </td>
                    
                </tr>
                 <tr>
                    <td class="title-rightt">Số điện thoại:</td>
                    <!-- <td><input class="input-userr" type="number" value="0987654321"></td> -->
                    <td>
                        <input class="input-userr" type="text" name="tel" value="<?=$tel?>"> 
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <!-- <td ><input class="btn-userprofilee" type="submit" value="Câp Nhật"></td> -->

                   <td>
                       <input class="btn-userprofilee" type="submit" value="cập nhật" name="capnhat">
                   </td>

                </tr>
            </table>
            
           </form>
           <h3 style="text-align: center;" class="thongbao">   <?php 
            if(isset($thongbao) && $thongbao!=""){
                echo $thongbao;
            }
            ?>
            </h3>
        </div>

    </div>
