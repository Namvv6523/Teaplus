<?php
ob_start();
session_start();
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/pdo.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/convert.php";
include "model/bill.php";


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
                    $product_same_category =   load_sanpham_cungloai($id, $category_id);
        
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
                            $address= $_POST['address'];
                            $tel= $_POST['tel'];
                            $id= $_POST['id'];
                            $img = $_FILES['hinh']['name'];
                            $target_dir = "./upload/";
                            $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {

                            } else {

                            }
                                 
                                 update_taikhoan($id,$user,$pass,$email,$img,$address,$tel);
                                 $_SESSION['user']= checkuser($user,$pass);  
                                                                                
                                 $thongbao="đã cập nhật thành công ";
                 
                             }
                             
                            include "./view/taikhoan/edit_taikhoan.php";
                             
                             
                            break;
            case 'logout': 
                        session_destroy();
                        header('location: index.php');
                        include "./view/home.php"; 
                 
                            break;
            case 'addToCart':
                if(isset($_SESSION['user']['id'])){
                        if(isset($_POST['addToCart']) && $_POST['addToCart'] ){
                        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";                             
                        $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : 1;                             
                        $sugar = isset($_POST['sugar']) ? $_POST['sugar'] : 1;                             
                        $ice = isset($_POST['ice-rock']) ? $_POST['ice-rock'] : 1;                             
                        $size = isset($_POST['size']) ? $_POST['size'] : 1;                             
                        $topping = isset($_POST['topping']) ? $_POST['topping'] : 1;                             
                        $image = isset($_POST['image']) ? $_POST['image'] : "";
                        $id = isset($_POST['id']) ? $_POST['id'] : 0;
                        $id_user = $_SESSION['user']['id'];
                        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
                        $stringTopping = 0;
                        for($i = 0 ; $i < count($topping);$i++){
                            $stringTopping += floatval($topping[$i]);
                        }
                        $result = ($product_price + floatval($sugar) + floatval($size) + floatval($ice) + floatval($stringTopping)) * floatval($quantity);
                       
                           

                        insert_giohang($id,$id_user,$product_name,$image,$sugar,$size,$ice,$stringTopping,$product_price,$quantity,$result);
                        $addProductCart = [$id,$image,$product_name,$product_price,$sugar,$size,$ice,$topping,$quantity,$result];

                        array_push($_SESSION['mycart'],$addProductCart);
                                    
                        // $_SESSION['mycart'] = [];
                        $cart_result = loadall_cart_idUser($id_user);
                            }
                            include "view/cart/view_cart.php";
                        }
                        else{
                            header("Location: index.php");
                        }
                        
                        break;
            case 'delete_cart':
                    if(isset($_GET['id_Cart'])){
                                $id = $_GET['id_Cart'];
                        delete_giohang($id)    ;        
                    }
                    else{
                        $_SESSION['mycart'] = [];
                    }
                    header("Location:index.php?act=viewCart&&header=headerSecond&f=1");
                    break;
            case 'viewCart':
                $id_user = $_SESSION['user']['id'];
                $cart_result = loadall_cart_idUser($id_user);
                    include "view/cart/view_cart.php";
                    break;
            case 'orderCart':
                    $id_user = $_SESSION['user']['id'];
                    $cart_result = loadall_cart_idUser($id_user);
                    include "view/cart/bill.php";
                    break;
            case 'upgradeGiohang':
                
                if(isset($_SESSION['user']['id']) && $_SESSION['user']['id'] ){
                    $id = isset($_POST['giohang_id']) ? $_POST['giohang_id'] : 0; 
                    $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : 1;                                  
                    $totalCash = isset($_POST['totalCash']) ? $_POST['totalCash'] : 1;                                  
                    for($i = 0 ; $i < count($quantity1);$i++){
                        $sql = "UPDATE giohang SET soluong ='$quantity1[$i]',thanhtien = '$totalCash[$i]' WHERE id =$id[$i]";
                        pdo_execute($sql);
                    }
                    
                    }
                    $id_user = $_SESSION['user']['id'];
                    $cart_result = loadall_cart_idUser($id_user);
                    include "view/cart/view_cart.php";
                    
                    break;
                case 'confirm_bill':
                    if(isset($_SESSION['user'])){ 
                            $id_user = $_SESSION['user']['id'];                                                   
                            $userName = isset($_POST['user']) ? $_POST['user'] : "";
                            $email = isset($_POST['email']) ? $_POST['email'] : "";
                            $bill_address = isset($_POST['address']) ? $_POST['address'] : "";
                            $bill_tele = isset($_POST['number-phone']) ? $_POST['number-phone'] : 0;
                            $note = isset($_POST['note']) ? $_POST['note'] : "";
                            $payment_method = isset($_POST['credit']) ? $_POST['credit'] : 0;
                            $bill_date = date('H:i:sa d/m/Y');
                            $total = isset($_POST['total']) ? $_POST['total'] : 0;
                            $status = 0;
                            $id_bill = insert_bill($id_user,$userName,$bill_address,$bill_tele,$payment_method,$bill_date,$total,$status);
                            // $id_user = $_SESSION['user']['id'];
                            $cart_result = loadall_cart_idUser($id_user);
                            for($i = 0 ; $i < count($_SESSION['mycart']);$i++){
                                insert_cart($id_user,
                                $cart_result[$i]['idsp'],                    
                                 $cart_result[$i]['image'],
                                 $cart_result[$i]['tensp'],
                                 $cart_result[$i]['gia'],
                                 $cart_result[$i]['sugar'],
                                 $cart_result[$i]['size'],
                                 $cart_result[$i]['ice'],
                                 $cart_result[$i]['topping'],
                                 $cart_result[$i]['soluong'],
                                 $cart_result[$i]['thanhtien'],                                 
                                    $id_bill);
                            
            
                        }
                        $_SESSION['mycart'] = [];
                        $list_bill = select_bill_one($id_bill);                        
                        $list_cart = select_cart_idBill($id_bill);                        
                        include "view/cart/bill_confirm.php";
                    }
                    else{
                        include "view/home.php";
                    }
                        // $list_bill = select_bill_one($id_bill);
                        // $list_cart = select_cart_idBill($id_bill);
                               
                    break;
                case 'myBill':
                    $list_bill = select_bill_one($id_bill);                        
                    $list_cart = select_cart_idBill($id_bill);   
                        include "view/cart/mybill.php";
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