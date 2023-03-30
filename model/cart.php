<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    if($del==1){
        $xoasp_th='<th>Thao tác</th>';     
        $xoasp_td2='<td></td>';
    }else{
        $xoasp_th='';
        $xoasp_td2='';
    }
    echo ' <tr>
    <td>Tên trà sữa</td>
    <td>Thêm topping</td>
    <td>Lựa chọn khác</td>
    <td>Giá</td>
    <td>Số lượng</td>
    <td>Tổng</td>
    <td>Hành động</td>

  </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;

      
        if($del==1){ 
            $xoasp_td='<th><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></th>';
        }else{
            $xoasp_td='';
        }
        echo '
                <tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $cart[3] . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $ttien . '</td>
                    ' . $xoasp_td . '
            
                </tr>';
        $i += 1;
    }
    echo '<tr>
                <td colspan="4">Tổng đơn hàng</td>

                <td>' . $tong . '</td>
                ' . $xoasp_td2 . '
            </tr>';
}

//bill chi tiết
function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';

    foreach ($listbill as $cart) {
        $hinh = $img_path.$cart['img'];
        $tong += $cart['thanhtien'];

        echo '
                <tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart['name'] . '</td>
                    <td>' . $cart['price'] . '</td>
                    <td>' . $cart['soluong'] . '</td>
                    <td>' . $cart['thanhtien'] . '</td>
                </tr>';
        $i += 1;
    }
    echo '<tr>
                <td colspan="4">Tổng đơn hàng</td>

                <td>' . $tong . '</td>
            </tr>';
}

// TỔNG ĐƠN HÀNG
function tongdonhang()
{
    $tong = 0;

    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;

    }
    return $tong;          
}


function insert_cart($id_user, $id_product, $image, $name, $price, $sugar, $size, $ice, $topping, $quantity, $cash, $id_bill)
{
    $sql = "INSERT INTO cart (iduser ,idpro ,img,name,price,sugar,size,ice,topping,soluong,thanhtien,idbill ) VALUES ($id_user,'$id_product','$image','$name','$price','$sugar','$size','$ice','$topping','$quantity','$cash','$id_bill') ";
    pdo_execute($sql);
}
function  insert_giohang($id,$id_user,$product_name,$image,$sugar,$size,$ice,$topping,$product_price,$quantity,$total)
{
    $sql = "INSERT INTO giohang (idsp,id_user ,tensp,image,sugar,size,ice,topping,gia,soluong,thanhtien) VALUES ('$id','$id_user','$product_name','$image','$sugar','$size','$ice','$topping','$product_price','$quantity','$total') ";
    pdo_execute($sql);
}

function select_cart_idBill($id_bill)
{
    $sql = "SELECT * FROM cart WHERE idbill  = $id_bill";
    $result = pdo_query($sql);
    return $result;
}
function  delete_giohang($id)
{
    $sql = "DELETE FROM giohang WHERE id = $id";
    pdo_execute($sql);
}
function  upgrade_quantity_giohang($id,$quantity)
{
    $sql = "UPDATE giohang SET soluong ='$quantity' WHERE id =$id";
    pdo_execute($sql);
}

function loadall_cart($idbill){
    $sql= "select*from cart where idbill=".$idbill;
    $bill=pdo_query($sql);
    return $bill;
}
function loadall_cart_idUser($idUser){
    $sql= "SELECT * FROM giohang WHERE id_user= $idUser ";
    $bill=pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill){
    $sql= "select*from cart where idbill=".$idbill;
    $bill=pdo_query($sql);
    return sizeof($bill);
}

function loadall_thongke() {
    // Build SQL query to select data from 'sanpham' and 'danhmuc' tables
    $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, COUNT(sanpham.id) AS countsp, MIN(sanpham.price) AS minprice, MAX(sanpham.price) AS maxprice, AVG(sanpham.price) AS avgprice, SUM(sanpham.price) AS sumprice";
    $sql .= " FROM sanpham";
    $sql .= " LEFT JOIN danhmuc ON danhmuc.id = sanpham.iddm";
    $sql .= " GROUP BY danhmuc.id";
    $sql .= " ORDER BY danhmuc.id DESC";
  
    // Execute SQL query and return the result set
    $listtk = pdo_query($sql);
    return $listtk;
  }
?>

?>
