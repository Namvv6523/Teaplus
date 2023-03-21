
        <div id="" class="boxtitle">Đăng Ký Thành Viên</div>

            <form action="index.php?act=dangky" method="post">
               emai:<br>
        <input type="email" name="email"> <br>
        username:<br>
        <input type="text" name="user"> <br>
        password: <br>
        <input type="password" name="password"> <br>
        <input type="submit" value="đăng Ký" name="dangky">
        <input type="reset" value="nhập lại">
        
            </form>
            đã có tài khoản : 
                    <a style="color:red" href="index.php?act=dangnhap">Đăng nhập </a>
          <h2 class="thongbao">   <?php 
            if(isset($thongbao) && $thongbao!=""){
                echo $thongbao;
            }
            ?>
            </h2>
