<?php
ob_start();
// session_start();
// if(isset($_SESSION['user'])&&($_SESSION['user']['role']==1)){
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "../model/thongke.php";
include "../model/bill.php";
include "../model/convert.php";
include "../model/lienhe.php";
include "../model/order.php";
include "header.php";
//controller
$count_product = count_product();
$count_taikhoan = count_taikhoan();
$sum_total_cash = loadall_bill_by_day();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            // kiểm tra xem người dùng có click vào nút add không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST["tenloai"];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                $tenloai = $_POST["tenloai"];
                $id = $_POST["id"];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;


            // controller sản phẩm
        case 'addsp':
            // kiểm tra xem người dùng có click vào nút add không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST["iddm"];
                $tensp = $_POST["tensp"];
                $giasp = $_POST["giasp"];
                $mota = $_POST["mota"];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }

                insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                //$kyw khai báo key word 
                $kyw=$_POST['kyw'];// key word = $_post kyw
                $iddm=$_POST['iddm'];// key word = $_post iddm
            }else{
                $kyw="";    
                $iddm=0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw,$iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham=loadall_sanpham("",0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            
            if (isset($_POST['capnhat'])) {
                $id = $_POST["id"];
                $iddm = $_POST["iddm"];
                $tensp = $_POST["tensp"];
                $giasp = $_POST["giasp"];
                $mota = $_POST["mota"];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id,$iddm, $tensp,$giasp,$mota,$hinh);
                $thongbao = "Cập nhật thành công";
            }
            
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("",0);
            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
            case 'addtk':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $hinh = $_FILES['hinh']['name'];
                    $tentk= $_POST["tentk"];
                    $matkhau = $_POST["matkhau"];
                    $email = $_POST["email"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    insert_taikhoan($tentk,$matkhau,$email,$hinh);
                    $thongbao = "Thêm thành công";
                }
    
                include "taikhoan/add.php";
                break;   
            case 'xoatk':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        delete_taikhoan($_GET['id']);
                    }
                    $listtaikhoan=loadall_taikhoan("",0);
                    include "taikhoan/list.php";
                    break;
            case 'suatk':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $taikhoan = loadone_taikhoan($_GET['id']);
                }
                $listtaikhoan= loadall_taikhoan();
                include "taikhoan/update.php";
                break;
            case 'updatetk':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    $id = $_POST["id"];
                    $tentk = $_POST["tentk"];
                    $matkhau = $_POST["matkhau"];
                    $email = $_POST["email"];
                    $diachi=$_POST['diachi'];
                    $dienthoai=$_POST['dienthoai'];
                    $vaitro=$_POST['vaitro'];
                   
                   
                    
                    update_taikhoanad($id,$tentk,$matkhau,$email,$diachi,$dienthoai,$vaitro);
                    
                    $thongbao = "Cập nhật thành công";
                }
                $listtaikhoan = loadall_taikhoan();
               
                include "taikhoan/list.php";
                break;    
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'thongke':
            case 'listtk':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw="";
                }
            $listthongke=loadall_thongke($kyw);
            include "thongke/list.php";
            break;
    
        case 'bieudo':
            $listthongke=loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'listbill':
            // if(isset($_POST['kyw'])&&($_POST['kyw']!="")) {
            //     $kyw=$_POST['kyw'];
            // }else{
            //     $kyw="";
            // }
            $listbill= loadall_bill(0);
            include "bill/listbill.php";
            break;
        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $listbill=loadall_bill("",0);
            include "bill/listbill.php";
        break;
        case 'suabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bill= loadone_bill($_GET['id']);
            }
            $listbill=loadall_bill(0);
            include "bill/update.php";
            break;
        case 'updatebill':
            if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                $ttdh = isset($_POST["ttdh"]) ? $_POST["ttdh"] : 0 ;
                $id = $_POST["id"];
                update_bill($id, $ttdh);
                $thongbao = "Cập nhật thành công";
            }
            $listbill=loadall_bill(0);
            // include "bill/listbill.php";
            header("Location: index.php?act=listbill");
            break;  
        case 'lienhe':
            $listlienhe = loadall_lienhe();
            include "lienhe/listLienHe.php";
            break; 
           
        case 'xoalh':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        delete_lienhe($_GET['id']);
                    }
                    $listlienhe = loadall_lienhe();
                include "lienhe/listLienHe.php";
                break;  
        case 'orderhistory':

                
                    $listorder = loadall_order(0);
                    include "order-history.php";
                    break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
// }else{
//     header('Location: ../index.php');
// }
ob_end_flush()
?>



