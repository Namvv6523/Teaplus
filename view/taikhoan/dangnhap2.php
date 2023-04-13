
<form id="" action="index.php?act=dangnhap&header=headerSecond" method="post" class="form" style="margin: 50px auto;">

  <p class="form-title">Đăng nhập</p>
  <div class="input-container">
    <label for="user">Username :</label>
   <input type="text" name="user" placeholder="username..." > 
   <p style="margin-top: 2px;" class="thongbao">
    <?php 
  if(isset($thongbaousername) && $thongbaousername!=""){
      echo $thongbaousername;
     }
     ?>
</p>
   <!-- <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span> -->
      </div>
      <div class="input-container">
    <label for="user">Password :</label>

        <input type="password" name="pass" id="" placeholder="password..." >
        <p style="margin-top: 2px;" class="thongbao">   <?php 
     if(isset($thongbaopassword) && $thongbaopassword!=""){
         echo $thongbaopassword;
     }
     ?>
</p>
        <!-- <span>
            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </span> -->
  
      </div>
                    <input type="submit" value="Đăng nhập" name="dangnhap" class="submit">
                    
                    <!-- <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li> -->
        <p  class="signup-link">
            Chưa có tài khoản?
        <a href="index.php?act=dangky&header=headerSecond">Đăng ký</a>
      </p>
      <p  class="signup-link"> 
        <a href="index.php?act=quenmk&header=headerSecond">quên mật khẩu ?</a>
      </p>
                    <!-- Chưa có tài khoản : 
                    <li><a style="color:red" href="index.php?act=dangky&header=headerSecond">Đăng ký </a></li> -->
  <?php 
  if(isset($thongbao)){
  echo '<p style="color: red;">'.$thongbao.'</p>';
}
  ?>
</form>
