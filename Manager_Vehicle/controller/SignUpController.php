<?php
include_once('../until/dbhelp.php');

if(!empty($_POST)){
    $s_numberphone = $_POST['numberphone'];
    $sql_get_user_by_numberphone = "SELECT * FROM tbl_user WHERE numberphone = ".$s_numberphone;
    if(executeResult($sql_get_user_by_numberphone) == null || count(executeResult($sql_get_user_by_numberphone)) == 0){
        $s_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql_insert_user = "INSERT INTO tbl_user (numberphone, password, role) VALUES ('$s_numberphone', '$s_password', '1')";

        if(execute($sql_insert_user)){
            $s_id_user = executeResult($sql_get_user_by_numberphone)[0] -> id;
            $s_name = $_POST['name'];
            $s_address = $_POST['address'];
            $s_driver_license = $_POST['driver_license'];
            $s_salary = $_POST['salary'];
            $s_age = $_POST['age'];
            $sql = "INSERT INTO tbl_driver (id_user, name, age, address, driver_license, salary, status, status_work) VALUE ('$s_id_user', '$s_name', '$s_age', '$s_address', '$s_driver_license', '$s_salary', '0', '0')";
            if(execute($sql)){
                echo json_encode(array('message' => 'Đăng kí thành công!'));
            }
            else{
                echo json_encode(array('message' => 'Đã xảy ra lỗi!'));
            }
        }
        else{
            echo json_encode(array('message' => 'Đã xảy ra lỗi!'));
        }
    }
    else{
        echo json_encode(array('message' => 'Số điện thoại đã tồn tại!'));
    }
}