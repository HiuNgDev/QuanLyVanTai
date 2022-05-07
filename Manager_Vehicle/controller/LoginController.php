<?php
include_once('../until/dbhelp.php');
if(!empty($_POST)){
    if(isset($_POST['numberphone'])){
        $s_numberPhone = $_POST['numberphone'];
    }
    if(isset($_POST['password'])){
        $s_password = $_POST['password'];
    }
    $sql = "select * from tbl_user where numberphone = ".$s_numberPhone;
    $userList = executeResult($sql);
    if($userList != null){
        if(password_verify($s_password, $userList[0] -> password)){
            if($userList[0] -> role == 0){
                echo json_encode(array('message' => 'admin'));
            }
            else{
                echo json_encode(array('message' => 'user'));
            }
        }
        else{
            echo json_encode(array('message' => 'Sai mật khẩu!'));
        }
    }
    else{
        echo json_encode(array('message' => 'Sai tên đăng nhập hoặc mật khẩu!'));
    }
}
