<?php
    function loadall_taikhoan(){
        $sql="SELECT * FROM taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return  $listtaikhoan;
    }
    function insert_taikhoan($avatar,$user,$pass,$email){
        $sql="insert into taikhoan(email,user,pass,avatar) values('$email','$user','$pass',' $avatar ')";
        pdo_execute($sql);
    }
    function checkuser($user,$pass){
        $sql= "select*from taikhoan where user='".$user."' AND pass='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function checkemail($email){
        $sql= "select*from taikhoan where email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function update_taikhoan($id,$user,$pass,$email,$address,$tel){
        
        $sql="update taikhoan set user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }
    function delete_taikhoan($id){
        $sql="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
    function loadone_taikhoan($id){
        $sql= "select*from taikhoan where id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    // function update_taikhoan($id,$hinh,$tentk,$matkhau,$email,$diachi,$dienthoai,$vaitro){
    //     if($hinh!="")
    //         $sql="update taikhoan set avatar='".$hinh."',user='".$tentk."',pass='".$matkhau."',email='".$email."',address='".$diachi."',tel='".$dienthoai."',role='".$vaitro."' where id=".$id;
    //     else
    //     $sql="update taikhoan set user='".$tentk."',pass='".$matkhau."',email='".$email."',address='".$diachi."',tel='".$dienthoai."',role='".$vaitro."' where id=".$id;
    //     pdo_execute($sql);
    // }
?>