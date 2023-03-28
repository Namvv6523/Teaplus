<?php 


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
        case 0 : 
            $toppingInfo = ["Không có"];
            break;
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

function getStatus($id)
{

    switch ($id) {
        case 0:
            $status = "Đơn hàng mới";
            break;
        case 1:
            $status = "Đang xử lý";
            break;
        case 2:
            $status = "Đang giao hàng";
            break;
        case 3:
            $status = "Hoàn tất";
            break;
        default:
            $status = "Đơn hàng mới";
            break;
    }
    return $status;
}

?>