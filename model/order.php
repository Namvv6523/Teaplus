<?php
function loadall_order($iduser){
    $sql= "select*from bill where 1";
    if ($iduser) $sql="AND iduser=".$iduser;
    $sql.=' order by id desc';
    $listbill=pdo_query($sql);
    return $listbill;
}

 
// function loadnamesp(){
//     $sql = "SELECT sanpham.name AS tensp";
//     $sql .= " FROM sanpham";
//     $sql .= " LEFT JOIN bill ON bill.id = sanpham.iddm";
//     $sql .= " GROUP BY bill.id ORDER BY bill.id DESC";
//     $listbill = pdo_query($sql);
//     return $listbill; 
// }

?>