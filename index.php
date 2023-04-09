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
include "model/binhluan.php";
include "model/lienhe.php";


include "global.php";
if(!isset($_SESSION['mycart'])){
    $_SESSION['mycart'] = [];
}
// $_SESSION['mycart'] = [];
// var_dump($_SESSION['mycart']);
$category_home = loadall_danhmuc();
if(isset($_SESSION['user'])){
    $idUser = $_SESSION['user']['id'];
    $count_bill = select_bill_count($idUser);
    $cartCount = count_giohang_idUser($idUser);
}


if (isset($_GET['header'])  && $_GET['header'] != "") {

    $header = $_GET['header'];
    switch ($header){
        case 'headerMain':
            if (isset($_SESSION['login'])  && $_SESSION['login'] != "") {
                $id = $_SESSION['user']['id'];
                $info_id = $id;
                
                $_SESSION['userId'] = $checkUserId;
                $info_user = $_SESSION['userId']['user'];
                $info_id = $_SESSION['userId']['id'];
                $info_password = $_SESSION['userId']['password'];
                $info_email = $_SESSION['userId']['email'];
                $iduser = $_SESSION['user']['id'];
                $billCount = select_bill_count($iduser);
                
                include "view/headerMain.php";
            } else {

                include "view/headerMain.php";
            }
         
            break;
        case 'headerSecond':
            
            if (isset($_SESSION['login'])  && $_SESSION['login'] != "") {
               

                

                include "view/header.php";
            } else {

                include "view/header.php";
            }

            break;
        case 'headerprd':
              
                include "view/headerProduct.php";
    
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
        case 'sanpham':
            $home_product_page = loadall_product_page();
            include "view/product-page.php";
            break;
        case 'productByType':
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $category_search =  loadall_sanpham("",$id );
            

            include "view/product-page.php";
            break;
        case 'search_product':
               
                if(isset($_POST['submit-value-search'])){
                    $value_search = $_POST['value-search'];
                    if ($value_search != "") {
                        $searchProduct = loadall_sanpham($value_search,0 );
                        include "view/product-page.php";
                    }
                  else{
                        header("Location:index.php");
                  }
                }

                    else{
                        header("Location:index.php");
                    }            
                  
                break;
                case 'search_productByPrice':
               
                    if(isset($_POST['submit-price-search'])){
                        $price1 = $_POST['price1'];
                        $str_replace_price1 = str_replace(",","", $price1);
                        $price2 = $_POST['price2'];
                        $str_replace_price2 = str_replace(",","", $price2);

                        if ($price1>0 && $price2>0 ) {

                            $searchProductByprice = loadall_sanpham_price($str_replace_price1,$str_replace_price2 );
                            include "view/product-page.php";
                        }
                      else{
                        // header("Location:index.php");
                        include "view/product-page.php";

                      }
                    }
         
                    // include "view/product-page.php";
                      
                    break;
            case 'productDetail':
                    $id = isset($_GET['id']) ? $_GET['id'] : 0;
                    $productDetail = loadone_sanpham($id);
                    $category_id = $productDetail['iddm'];
                    $product_same_category =   load_sanpham_cungloai($id, $category_id);
        
                    include "view/productDetail.php";
                    break;
                    case 'dangnhap': 
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
                         
                                include "./view/taikhoan/dangnhap2.php";
                                break;
            case 'dangky': 
                        if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                            $email= $_POST['email'];
                            $user= $_POST['user'];
                            $pass= $_POST['password'];
                            insert_taikhoan($user,$pass,$email,"");
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
                             
                            include "./view/taikhoan/profileUser.php";
                             
                             
                            break;
            case 'logout': 
                        session_destroy();
                        header('location: index.php');
                        include "./view/home.php"; 
                 
                            break;
            case 'addToCart':
                if(isset($_SESSION['user']['id'])){
                        if(isset($_POST['buynow']) && $_POST['buynow'] ){
                            $id_user = $_SESSION['user']['id'];
                            if(is_array($_POST['topping']) &&  isset($_POST['topping']) ){
                                $checkTopping = $_POST['topping'];
                            }else{
                                $checkTopping = 0;
                            }
                        handleInsertToCart($_POST['product_name'], $_POST['product_price'], $_POST['sugar'], $_POST['ice-rock'], $_POST['size'], $checkTopping, $_POST['image'], $_POST['id'], $_SESSION['user']['id'], $_POST['quantity']);
                        $cart_result = loadall_cart_idUser($id_user);
                        include "view/cart/view_cart.php"; 
                        }
                        else if(isset($_POST['addToCart']) && $_POST['addToCart'] ){
                            handleInsertToCart($_POST['product_name'], $_POST['product_price'], $_POST['sugar'], $_POST['ice-rock'], $_POST['size'], $_POST['topping'], $_POST['image'], $_POST['id'], $_SESSION['user']['id'], $_POST['quantity']);
                            header("Location: index.php");
                        }
                        }
                        else{
                            include "./view/taikhoan/dangnhap2.php";
                            
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
                if(isset($_SESSION['user'])){
                $id_user = $_SESSION['user']['id'];
                $cart_result = loadall_cart_idUser($id_user);
                    include "view/cart/view_cart.php";
                }
                else{
                    header("Location: index.php");
                }
                    break;
            case 'orderCart':
                if(isset($_SESSION['user'])){
                    if(isset($_SESSION['check']) && $_SESSION['check'] != null){
                    $id_user = $_SESSION['user']['id'];
                    $cart_result = loadall_cart_idUser($id_user);
                    $_SESSION['check'] = [];
                    include "view/cart/bill.php";
                    }
                    else{
                        header("Location: index.php");
                    }
                }else{
                    header("Location: index.php");
                }
               
                    break;
            case 'upgradeGiohang':

                if(isset($_SESSION['user'])){
                    if(isset($_POST['orderCart']) && $_POST['orderCart'] != null){
                    $id_user = $_SESSION['user']['id'];
                    $cart_result = loadall_cart_idUser($id_user);
                    $_SESSION['check'] = [];
                    include "view/cart/bill.php";
                    }
                   
                
                else if($_POST['randcheck']==$_SESSION['rand']){
                
                    $id = isset($_POST['giohang_id']) ? $_POST['giohang_id'] : 0; 
                    $quantity1 = isset($_POST['quantity1']) ? $_POST['quantity1'] : 1;                                  
                    $totalCash = isset($_POST['totalCash']) ? $_POST['totalCash'] : 1;                                  
                    for($i = 0 ; $i < count($quantity1);$i++){
                        $sql = "UPDATE giohang SET soluong ='$quantity1[$i]',thanhtien = '$totalCash[$i]' WHERE id =$id[$i]";
                        pdo_execute($sql);
                    }
                    

                    $id_user = $_SESSION['user']['id'];
                    $cart_result = loadall_cart_idUser($id_user);
                    include "view/cart/view_cart.php";
                    }
                    else{
                        header("Location: index.php");
                    }
                   
                }
                else{
                    header("Location: index.php");
                }
                    
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
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $bill_date = date('H:i:sa d/m/Y');
                            $total = isset($_POST['total']) ? $_POST['total'] : 0;
                            $status = 0;
                            if($userName != ""){
                            $id_bill = insert_bill($id_user,$userName,$bill_address,$bill_tele,$payment_method,$bill_date,$total,$status,$note);
                            // $id_user = $_SESSION['user']['id'];
                            $giohang_id = isset($_POST['giohang_id']) ? $_POST['giohang_id'] : 0;
                            $cart_result = loadall_cart_idUser($id_user);
                            for($i = 0 ; $i < count($cart_result);$i++){
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
                                upgrade_status_giohang(2,$giohang_id[$i]);
                            
            
                        }
                        // $_SESSION['mycart'] = [];
                        $list_bill = select_bill_one($id_bill);                        
                        $list_cart = select_cart_idBill($id_bill);   
                        include "view/cart/bill_confirm.php";
                    }     
                    else{
                        header("Location: index.php");
                    }             
                 
                   
                        }
                    else{
                        include "view/home.php";
                    }
                        // $list_bill = select_bill_one($id_bill);
                        // $list_cart = select_cart_idBill($id_bill);
                               
                    break;
                // case 'confirm_bill':
                //     var_dump($_GET['order']);
                //     if(isset($_SESSION['user'])){ 
                //         if(isset($_GET['order']) ){
                //             $id_user = $_SESSION['user']['id'];                                                   
                //             $userName = isset($_GET['user']) ? $_GET['user'] : "";
                //             $email = isset($_GET['email']) ? $_GET['email'] : "";
                //             $bill_address = isset($_GET['address']) ? $_GET['address'] : "";
                //             $bill_tele = isset($_GET['number-phone']) ? $_GET['number-phone'] : 0;
                //             $note = isset($_GET['note']) ? $_GET['note'] : "";
                //             $payment_method = isset($_GET['credit']) ? $_GET['credit'] : 0;
                //             date_default_timezone_set('Asia/Ho_Chi_Minh');
                //             $bill_date = date('H:i:sa d/m/Y');
                //             $total = isset($_GET['total']) ? $_GET['total'] : 0;
                //             $status = 0;
                //             if($userName != ""){
                //             $id_bill = insert_bill($id_user,$userName,$bill_address,$bill_tele,$payment_method,$bill_date,$total,$status,$note);
                //             // $id_user = $_SESSION['user']['id'];
                //             $giohang_id = isset($_GET['giohang_id']) ? $_GET['giohang_id'] : 0;
                //             $cart_result = loadall_cart_idUser($id_user);
                //             for($i = 0 ; $i < count($cart_result);$i++){
                //                 insert_cart($id_user,
                //                 $cart_result[$i]['idsp'],                    
                //                  $cart_result[$i]['image'],
                //                  $cart_result[$i]['tensp'],
                //                  $cart_result[$i]['gia'],
                //                  $cart_result[$i]['sugar'],
                //                  $cart_result[$i]['size'],
                //                  $cart_result[$i]['ice'],
                //                  $cart_result[$i]['topping'],
                //                  $cart_result[$i]['soluong'],
                //                  $cart_result[$i]['thanhtien'],                                 
                //                     $id_bill);
                //                     upgrade_status_giohang(2,$giohang_id[$i]);
                            
            
                //         }
                //         // $_SESSION['mycart'] = [];
                //         $list_bill = select_bill_one($id_bill);                        
                //         $list_cart = select_cart_idBill($id_bill);   
                //         include "view/cart/bill_confirm.php";
                //     }     
                //     else{
                //         header("Location: index.php");
                //     }             
                //  }
                   
                //         }
                //     else{
                //         include "view/home.php";
                //     }
                //         $list_bill = select_bill_one($id_bill);
                //         $list_cart = select_cart_idBill($id_bill);
                               
                //     break;
                case 'myBill':
                    if(isset($_SESSION['user'])){
                        $id_user = $_SESSION['user']['id'];   
                        $list_bill = select_bill_idUser($id_user);                        
                         
                        include "view/cart/mybill.php";
                    }else{
                        include "./view/taikhoan/dangnhap2.php";
                        
                    }
                        break;
                case 'changeStatusBill' : 
                    
                    if(isset($_SESSION['user'])){
                        if(isset($_POST['cancelCart'])){
                            $id = isset($_POST['idBill']) ? $_POST['idBill'] : 0;
                            $id_user = $_SESSION['user']['id'];
                            update_bill_status($id,$id_user,5);


                            $list_bill = select_bill_idUser($id_user);   
                            include "view/cart/mybill.php";                        
                        }
                        else if(isset($_POST['receive_cart'])){
                            $id = isset($_POST['idBill']) ? $_POST['idBill'] : 0;
                            $id_user = $_SESSION['user']['id'];
                            update_bill_status($id,$id_user,6);


                            $list_bill = select_bill_idUser($id_user);   
                            include "view/cart/mybill.php";   
                        }

                    }
                    else{
                        include "view/home.php";

                    }



                    break;  
                    case 'lienhe':
                        if (isset($_POST['submit']) && ($_POST['submit'])) {
                            $hovaten= $_POST['hovaten'];
                            $diachi= $_POST['diachi'];
                            $dienthoai= $_POST['dienthoai'];
                            $email= $_POST['email'];
                            $loinhan= $_POST['loinhan'];
                            insert_lienhe($hovaten,$dienthoai,$email,$diachi,$loinhan);
                            $thongbao="đã gửi thông tin liên hệ thành công .";                 
                        }
                        
                        // include "./view/taikhoan/dangky.php";
                            
                        include "view/lienhe.php"; 
                        break; 
                        
                        case 'tintuc':
                            
                            
                            
                                
                            include "view/tintuc.php"; 
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