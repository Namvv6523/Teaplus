<?php
ob_start();
session_start();
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/pdo.php";
include "model/taikhoan.php";
// include "model/account.php";
// include "model/cart.php";
include "global.php";
if(!isset($_SESSION['mycart'])){
    $_SESSION['mycart'] = [];
}
$category_home = loadall_danhmuc();

if (isset($_GET['header'])  && $_GET['header'] != "") {

    $header = $_GET['header'];
    switch ($header){
        case 'headerMain':
            if (isset($_SESSION['login'])  && $_SESSION['login'] != "") {
                $id = $_SESSION['user']['id'];
                $info_id = $id;
                // $checkUserId =  checkUserId($info_id);
                $_SESSION['userId'] = $checkUserId;
                $info_user = $_SESSION['userId']['user'];
                $info_id = $_SESSION['userId']['id'];
                $info_password = $_SESSION['userId']['password'];
                $info_email = $_SESSION['userId']['email'];

                include "view/headerMain.php";
            } else {

                include "view/headerMain.php";
            }
         
            break;
        case 'headerSecond':

            
            if (isset($_SESSION['login'])  && $_SESSION['login'] != "") {
                // $id = $_SESSION['user']['id'];
                // $info_id = $id;
                // // $checkUserId =  checkUserId($info_id);
                // $_SESSION['userId'] = $checkUserId;
                // $info_user = $_SESSION['userId']['user'];
                // $info_id = $_SESSION['userId']['id'];
                // $info_password = $_SESSION['userId']['password'];
                // $info_email = $_SESSION['userId']['email'];

                include "view/header.php";
            } else {

                include "view/header.php";
            }

            break;
        default:
        include "view/headerMain.php";
            break;
    }
} else {
    include "view/headerMain.php";
}

$home_product = loadall_sanpham_home();
// $category_home  = select_category_all();
// $product_top10 = select_product_homeTop10();

if ((isset($_GET['act'])) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'productByType':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $category_search =  loadall_sanpham("",$id );
            

            include "view/products-by-type.php";
            break;
        case 'search_product':
               
                if(isset($_POST['submit-value-search'])){
                    $value_search = $_POST['value-search'];
                    if ($value_search != "") {
                        $searchProduct = loadall_sanpham($value_search,0 );
                        include "view/searchProduct.php";
                    }
                  else{
                    header("Location:index.php");
                  }
                }

                else{
                    header("Location:index.php");
                }            
                  
                break;
            case 'productDetail':
                    $id = isset($_GET['id']) ? $_GET['id'] : 0;
                    $productDetail = loadone_sanpham($id);
                    $category_id = $productDetail['iddm'];
                    $product_same_category =    load_sanpham_cungloai($id, $category_id);
        
                    include "view/productDetail.php";
                    break;
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
                                 // header("location: index.php?act=thongtintk");
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
        
        
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}


include "view/footer.php";


ob_end_flush()
?>