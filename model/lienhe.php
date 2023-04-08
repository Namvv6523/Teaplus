<?php

function insert_lienhe($hovaten,$dienthoai,$email,$diachi,$loinhan){
    $sql = "INSERT INTO lienhe (hovaten,dienthoai,email,diachi,loinhan) VALUES ('$hovaten','$dienthoai','$email','$diachi','$loinhan')";
    pdo_execute($sql);
}

    function delete_lienhe($id){
        $sql="delete from lienhe where id=".$id;
        pdo_execute($sql); //Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }

    function loadall_lienhe(){
        $sql="SELECT * FROM lienhe order by id desc";
        $listlienhe=pdo_query($sql);// lấy tất cả giá trị
        return  $listlienhe;
    }
    // function loadall_taikhoan(){
    //     $sql="SELECT * FROM taikhoan order by id desc";
    //     $listtaikhoan=pdo_query($sql);
    //     return  $listtaikhoan;
    // }

    function loadone_lienhe($id){
        $sql= "select*from lienhe where id=".$id;
        $dm=pdo_query_one($sql);// lấy 1 giá trị
        return $dm;
    }

    function update_lienhe($id,$tenloai){
        $sql="update lienhe set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);//Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }
?>