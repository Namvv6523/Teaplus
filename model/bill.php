<?php


function loadall_bill($iduser){
    
    $sql= "select*from bill where iduser=".$iduser;
    $listbill=pdo_query($sql);
    return $listbill;
}

function loadone_bill($id){
    $sql= "select*from bill where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function select_bill_one($id)
{
    $sql = "SELECT * FROM bill WHERE id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function insert_bill($iduser,$name,$address,$tel,$pttt,$ngaydathang,$tongdonhang,$status){
    $sql="insert into bill(iduser,bill_name,bill_address,bill_tel,bill_pttt,ngaydathang,tatal,bill_status) values('$iduser','$name','$address','$tel','$pttt','$ngaydathang','$tongdonhang','$status')";
    return pdo_execute_return_lastInsertId($sql);
}
function select_bill_idUser($id_user){
    $sql="SELECT * FROM bill where iduser = $id_user";
    $listBill=pdo_query($sql);
    return  $listBill;
}

?>