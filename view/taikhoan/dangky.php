
<form style="margin: 50px auto;" action="index.php?act=dangky&header=headerSecond" method="post" class="form">
<!-- <form style="margin: 50px auto;" method="post" class="form"> -->

<p class="form-title">Đăng ký</p>

 <div class="input-container">
     <label for="email">Email :</label><br>
 <input type="text" name="email" placeholder="Email..." > <br>
 <p style="" class="thongbao">  
  <?php 
     if(isset($thongbaoemail) && $thongbaoemail!=""){
         echo  $thongbaoemail;
     }
     ?>
 </p> 
</div>
<div class="input-container">
  <label for="user">Username :</label>
  <input type="text" name="user" placeholder="Username..." >
  <p style="margin-top: 2px;" class="thongbao">
    
       <?php 
     if(isset($thongbaousername) && $thongbaousername!=""){
         echo $thongbaousername;
        }
        ?>
</p>

  </div>
  <div class="input-container">
 <label for="passwrod">Password :</label>
 
 <input type="password" name="password" placeholder="Password..." >
 <p style="margin-top: 2px;" class="thongbao">   <?php 
     if(isset($thongbaopassword) && $thongbaopassword!=""){
         echo $thongbaopassword;
     }
     ?>
</p>
</div>
<input type="submit" value="đăng Ký" name="dangky" class="submit">

<p class="signup-link">
  Đã có tài khoản?
  <a href="index.php?act=dangnhap&header=headerSecond">Đăng nhập</a>
</p>

<p style="text-align: center;" class="thongbao">   <?php 
     if(isset($thongbao) && $thongbao!=""){
       echo $thongbao;
      }
      ?>
</p>

</form>



<!-- <span>
  <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
  </svg>
</span> -->
<!-- <span>
  <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
  </svg>
</span> -->