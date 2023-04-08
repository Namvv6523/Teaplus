<?php
    function insert_danhmuc($tenloai){
        $sql="insert into danhmuc(name) values('$tenloai')";
        pdo_execute($sql);// Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }

    function delete_danhmuc($id){
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql); //Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }

    function loadall_danhmuc(){
        $sql="SELECT * FROM danhmuc order by id desc";
        $listdanhmuc=pdo_query($sql);// lấy tất cả giá trị
        return  $listdanhmuc;
    }

    function loadone_danhmuc($id){
        $sql= "select*from danhmuc where id=".$id;
        $dm=pdo_query_one($sql);// lấy 1 giá trị
        return $dm;
    }

    function update_danhmuc($id,$tenloai){
        $sql="update danhmuc set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);//Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
    }
?>