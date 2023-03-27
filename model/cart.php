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
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
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

function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql="insert into bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,tongdonhang) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function  insert_giohang($id,$id_user,$product_name,$image,$sugar,$size,$ice,$topping,$product_price,$quantity,$total)
{
    $sql = "INSERT INTO giohang (idsp,id_user ,tensp,image,sugar,size,ice,topping,gia,soluong,thanhtien) VALUES ('$id','$id_user','$product_name','$image','$sugar','$size','$ice','$topping','$product_price','$quantity','$total') ";
    pdo_execute($sql);
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
function loadone_bill($id){
    $sql= "select*from bill where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
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
function loadall_bill($iduser){
    
    $sql= "select*from bill where iduser=".$iduser;
    $listbill=pdo_query($sql);
    return $listbill;
}
function get_ttdh($n){
    switch ($n){
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Hoàn tất";
            break;

        default:
            $tt="Đơn hàng mới";
            break;
    }
    return $tt; 
}
function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk; 
}

function handleSugar($sugar){
    switch ($sugar) {
        case '2000':
            $sugarInfo = "100%";
        break;
        case '1000':
            $sugarInfo = "70%";
            break;
    
        default:
            $sugarInfo = "100%";
        break;
    }
    return $sugarInfo;
}

function handleSize($size){
    switch ($size) {
        case '5000':
            $sizeInfo = "M";
        break;
        case '10000':
            $sizeInfo = "L";
            break;
    
        default:
            $sizeInfo = "M";
        break;
    }
    return $sizeInfo;
}

function handleIce($ice){
    switch ($ice) {
        case '5':
            $iceInfo = "100%";
        break;
        case '4':
            $iceInfo = "70%";
        break;
        case '3':
            $iceInfo = "50%";
        break;
        case '2':
            $iceInfo = "30%";
        break;
        case '1':
            $iceInfo = "Không đá";
        break;
    
        default:
            $iceInfo = "100%";
        break;
    }
    return $iceInfo;
}
function handleTopping($topping){
    


    switch ($topping) {
        case 5000:
            $toppingInfo = ["Chân trâu baby"];
        break;
        case 11000:
            $toppingInfo = ["Chân trâu baby","Khoai môn"];
        break;
        case 18000:
            $toppingInfo = ["Chân trâu baby","Khoai môn" ,"Trân châu đen"];
        break;
        case 26000:
            $toppingInfo = ["Chân trâu baby", "Khoai môn", "Trân châu đen" , "Trân châu cam"];
        break;
        case 6000:
            $toppingInfo = ["Khoai môn"];
        break;
        case 13000:
            $toppingInfo = ["Khoai môn" , "Trân châu đen"];
        break;
        case 21000:
            $toppingInfo = ["Khoai môn", "Trân châu đen" , "Trân châu cam"];
        break;
        case 7000:
            $toppingInfo = ["Trân châu đen"];
        break;
        case 15000:
            $toppingInfo = ["Trân châu đen" , "Trân châu cam"];
        break;
        case 8000:
            $toppingInfo = ["Trân châu cam"];
        break;
    
        default:
            $toppingInfo = ["Chân trâu baby"];
        break;
    }
    return $toppingInfo;
}
?>
