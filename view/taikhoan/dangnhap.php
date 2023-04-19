<form id="" action="index.php?act=dangnhap" method="post">
                    <div class="row mb10">
                        Tên đăng nhập <br>
                        <input type="text" name="user"> <br>
                    </div>
                    <div class="row mb10">
                        Mật khẩu <br>
                        <input type="password" name="pass" id=""> <br>
                    </div>
                    <div class="row mb10">
                        <input type="checkbox" name="" id=""> Ghi nhớ mật khẩu? <br>
                    </div>
                    <input type="submit" value="Đăng nhập" name="dangnhap">

                    <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                    Chưa có tài khoản : 
                    <li><a style="color:red" href="index.php?act=dangky&header=headerSecond">Đăng ký </a></li>

</form>
  <?php 
  if(isset($thongbao)){
  echo '<h2>'.$thongbao.'</h2>';
}
  ?>
