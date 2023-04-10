
<form id="" action="index.php?act=quenmk&header=headerSecond" method="post" class="form" style="margin: 50px auto;">

  <p class="form-title">Quên mật khẩu</p>
  <div class="input-container">
    <label for="user">Nhập email :</label>
   <input type="email" name="email" placeholder="Email..." required> 
      </div>

      <input type="submit" value="Gửi email" name="quemmk" class="submit">                
        <p  class="signup-link">Đã có tài khoản?<a href="index.php?act=dangnhap&header=headerSecond">đăng nhập</a></p>
      <p  class="signup-link">chưa có tài khoản?<a href="index.php?act=dangky&header=headerSecond">đăng ký</a></p>
  <?php 
  if(isset($thongbao)){
  echo '<p style="color: red;">'.$thongbao.'</p>';
}
  ?>
</form>
