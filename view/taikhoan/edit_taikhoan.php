<?php
if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    extract($_SESSION['user']);
}

$hinhpath = "./upload/" . $avatar;


?>

<form style="margin: 50px auto;" action="index.php?act=dangky&header=headerSecond" method="post" class="form">

    <p class="form-title">Thông tin tài khoản</p>

    <div class="input-container">
        <label for="">Email :</label>
        <input type="email" name="email" value="<?= $email ?>"> <br>
    </div>

    <div class="input-container">
        <label for=""> Họ và tên :</label>
        <input type="text" name="user" value="<?= $user ?>"> <br>
    </div>

    <div class="input-container">
        <label for="">Mật khẩu :</label>
        <input type="password" name="pass" value="<?= $pass ?>"> <br>
    </div>

    <div class="input-container">
        <label for="">Địa chỉ :</label>
        <input type="text" name="address" value="<?= $address ?>"> <br>
    </div>

    <div class="input-container">
        <label for="">Ảnh đại diện :</label>
        <img width="50" src="<?= $hinhpath ?>" alt="">
        <input type="file" name="hinh" value=""> <br>
    </div>

    <div class="input-container">
        <label for="">Số điện thoại :</label>
        <input type="text" name="tel" value="<?= $tel ?>"> <br>
    </div>

    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="submit" value="cập nhật" name="capnhat">


    <p class="thongbao"> <?php
                            if (isset($thongbao) && $thongbao != "") {
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
</div>
</div>