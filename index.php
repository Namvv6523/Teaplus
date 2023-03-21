<?php 
session_start();
ob_start();
include "./global.php";
// modal
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";

// view
include "./view/header.php";
include "./view/menu.php";


if(isset($_GET['act'] ) && ($_GET['act'] !="")){
$act = $_GET['act'];
switch($act){
    case 'dangnhap': 
       echo '<div> đăng nhập </div>';
       if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
        $user= $_POST['user'];
        $pass= $_POST['pass'];
        $checkuser=checkuser($user,$pass);

    if(is_array($checkuser)){
        $_SESSION['user']= $checkuser;
        $thongbao="đăng nhập thành công ";

        header('location: index.php');
    }else{
        $thongbao="đăng nhập không  thành công , kiểm tra lại user and password ";
        
    }
        
}

        include "./view/taikhoan/dangnhap.php";
        break;
        case 'dangky': 
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email= $_POST['email'];
                $user= $_POST['user'];
                $pass= $_POST['password'];
                insert_taikhoan($email,$user,$pass);
                $thongbao="đã đăng ký thành công .vui lòng đăng nhập để sử dụng thêm chức năng bình luận";

            }

            include "./view/taikhoan/dangky.php";
            
            break;
        case 'thongtintk':

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                $user= $_POST['user'];
                $pass= $_POST['pass'];
                $email= $_POST['email'];
                // 
                $address= $_POST['address'];
                $tel= $_POST['tel'];
                $id= $_POST['id'];
                // 
                $img = $_FILES['hinh']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                
                update_taikhoan($id,$user,$pass,$email,$img,$address,$tel);

                $_SESSION['user']= checkuser($user,$pass);
                header("location: index.php?act=thongtintk");
                // insert_taikhoan($email,$user,$pass);

                $thongbao="đã cập nhật thành công ";

            }
            
            include "./view/taikhoan/edit_taikhoan.php";
            
            
              break;
      case 'logout': 
        session_destroy();
                    // header('location: index.php');
                    header('location: index.php');

        include "./view/home.php"; 

              break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;

        default:
        include "./view/home.php"; 
        break;
        
        
    }
    
}else{
    include "./view/home.php"; 

}
        
        include "./view/footer.php";
        include "./view/muasp.php";
        include "./view/loadingmouse.php";

        
        ob_flush();
        ?>
        <!-- <img src="upload/img_user.jpg" alt=""> -->