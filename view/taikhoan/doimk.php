
<form style="margin: 50px auto;" action="index.php?act=doimk&header=headerSecond" method="post" class="form">

<p class="form-title">Đổi mật khẩu</p>

 <div class="input-container">
     <label for="matkhaucu">Mật khẩu cũ :</label>
 <input type="password" name="passwordOld" placeholder="Mật khẩu cũ ..." required> 
</div>

 <div class="input-container">
 <label for="passwrod">Mật khẩu mới :</label>
 <input type="password" name="passwordnew" placeholder="Mật khẩu mới..." required>
 </div>

 <div class="input-container">
 <label for="passwrod">Nhập lại mật khẩu mới :</label>
 <input type="password" name="passwordCheck" placeholder="Nhập lại mật khẩu mới..." required>
 </div>
 <input type="submit" value="đổi mật khẩu" name="doimk" class="submit">

<!-- <p class="signup-link">
Đã có tài khoản?
 <a href="index.php?act=dangnhap&header=headerSecond">Đăng nhập</a>
</p> -->

<p class="thongbao">   <?php 
     if(isset($thongbao) && $thongbao!=""){
         echo $thongbao;
     }
     ?>
     </p>

        <!-- emai:<br>
 <input type="email" name="email"> 
 username:<br>
 <input type="text" name="user">
 password: <br>
 <input type="password" name="password">
 <input type="reset" value="nhập lại"> -->
     </form>


