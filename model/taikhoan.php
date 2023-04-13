<?php
    function loadall_taikhoan(){
        $sql="SELECT * FROM taikhoan order by id desc";
        $listtaikhoan=pdo_query($sql);
        return  $listtaikhoan;
    }
   
   
   
    function checkUserId($id){
        $sql = "SELECT * FROM taikhoan WHERE id = $id ";
       
        $result = pdo_query_one($sql);
     
        return $result;
    }


    function insert_taikhoan($email,$user,$pass){
        $sql = "insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
                pdo_execute($sql);
    }
    
    function checkuser($user,$pass){
        $sql ="select * from taikhoan where user='".$user."' and pass='".$pass."'"; 
        $sp = pdo_query_one($sql);
        return $sp;
    
    }
    function checkemail($email){
        $sql ="select * from taikhoan where email='".$email."'"; 
        $sp = pdo_query_one($sql);
        return $sp;
    
    }
    
    function update_taikhoan($id,$tentk,$matkhau,$email,$diachi,$dienthoai,$vaitro){
            $sql = "update taikhoan set  user='".$tentk."', pass='".$matkhau."', email='".$email."',address='".$diachi."',tel='".$dienthoai."',role='".$vaitro."' where id=".$id;
        pdo_execute($sql);
        
    }
   
    // function update_taikhoan($id,$img,$tentk,$matkhau,$email,$diachi,$dienthoai,$vaitro){
    //     if($img!="")
    //     $sql = "update taikhoan set avatar='".$img."  user='".$tentk."', pass='".$matkhau."', email='".$email."',address='".$diachi."',tel='".$vaitro."' where id=".$id;    
    //     else
    //     $sql = "update taikhoan set  user='".$tentk."', pass='".$matkhau."', email='".$email."',address='".$diachi."',tel='".$vaitro."' where id=".$id;
    //     pdo_execute($sql);
    // }
    // function  update_taikhoanad($id,$tentk,$matkhau,$email,$diachi,$dienthoai,$vaitro){
    //     $sql = "update taikhoan set  user='".$tentk."', pass='".$matkhau."', email='".$email."',address='".$diachi."',tel='".$vaitro."' where id=".$id;
    //     pdo_execute($sql);
        
    
    // }
   
    function loadOne_taikhoan($id){
        $sql ="select *from taikhoan where id=?"; 
        return pdo_query_one($sql,$id);
    }
    function delete_taikhoan($id){
        $sql ="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
?>