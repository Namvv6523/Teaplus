<?php
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

function update_taikhoan($id,$user,$pass,$email,$img,$address,$tel){
        $sql = "update taikhoan set  user='".$user."', pass='".$pass."', email='".$email."',img='".$img."',address='".$address."',tel='".$tel."' where id=".$id;
    pdo_execute($sql);
    
}
function update_taikhoan1($id,$pass,$email,$img,$address,$tel){
    $sql = "update taikhoan set  pass='".$pass."', email='".$email."',img='".$img."',address='".$address."',tel='".$tel."' where id=".$id;
pdo_execute($sql);

}

function update_taikhoanad($id,$user,$pass,$email,$address,$tel,$rol){
    $sql = "update taikhoan set  user='".$user."', pass='".$pass."', email='".$email."',address='".$address."',tel='".$tel."',rol='".$rol."' where id=".$id;

pdo_execute($sql);

}
function loadAll_taikhoan(){ 
    $sql ="select * from taikhoan order by id desc"; 
              $listtaikhoan= pdo_query($sql);
              return $listtaikhoan;
}
function loadOne_taikhoan($id){
    $sql ="select *from taikhoan where id=?"; 
    return pdo_query_one($sql,$id);
}
function delete_taikhoan($id){
    $sql ="delete from taikhoan where id=".$id;
    pdo_execute($sql);
}
?>