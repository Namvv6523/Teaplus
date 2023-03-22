<?php
ob_start();
session_start();
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/pdo.php";
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