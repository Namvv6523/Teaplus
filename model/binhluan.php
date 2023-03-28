<?php
 function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql = "INSERT INTO binhluan (noidung,idpro,iduser,ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan') ";
    pdo_execute($sql);
}
function loadall_binhluan($idpro){
    $sql="SELECT * FROM `binhluan` ";
    if($idpro>0)
        $sql.=" where idpro='$idpro' ";
    $sql.=" order by id desc";
    $listbl=pdo_query($sql);
    return  $listbl;
}
function select_comment_count($idpro)
{
    $sql = "SELECT * FROM binhluan WHERE idpro = $idpro";
    $result = pdo_query($sql);
    return sizeof($result);
}
?>