<?php
    // function insert_trangthaidonhang($tenloai){
    //     $sql="insert into trangthaidonhang(namedm) values('$tenloai')";
    //     pdo_execute($sql);// Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    // }

    function delete_trangthaidonhang($id){
        $sql="delete from trangthaidonhang where id=".$id;
        pdo_execute($sql); //Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }

    function loadall_trangthaidonhang(){
        $sql="SELECT * FROM trangthaidonhang order by id desc";
        $listtrangthaidonhang=pdo_query($sql);// lấy tất cả giá trị
        return  $listtrangthaidonhang;
    }

    function loadone_trangthaidonhang($id){
        $sql= "select*from trangthaidonhang where id=".$id;
        $dm=pdo_query_one($sql);// lấy 1 giá trị
        return $dm;
    }

    function update_trangthaidonhang($id,$tenloai){
        $sql="update trangthaidonhang set tinhtrang='".$tenloai."' where id=".$id;
        pdo_execute($sql);//Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }
?>