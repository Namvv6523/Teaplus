<?php


function loadall_bill($iduser){
    $sql= "select*from bill where 1";
    if ($iduser) $sql="AND iduser=".$iduser;
    // $sql.='order by id desc';
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
function select_bill_all(){
    $sql="SELECT * FROM sanpham where 1 order by id desc limit 0,8";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function detele_bill($id){
    $sql="delete from bill where id=".$id;
    pdo_execute($sql);
}
function update_bill($id,$ttdh){
    $sql="update bill set bill_status='".$ttdh."' where id=".$id;
    pdo_execute($sql);//Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
}


?>