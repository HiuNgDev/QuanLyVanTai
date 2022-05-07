<?php
include_once('../until/dbhelp.php');
if(!empty($_POST)){
    if(isset($_POST['idCheckDriver'])){
        $s_id = $_POST['idCheckDriver'];
        $sql_check_driver = "UPDATE tbl_driver SET status=1 WHERE id=".$s_id;
        if(execute($sql_check_driver)){
            echo json_encode(array('message' => 'Thành công!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }

    }

    if(isset($_POST['idUnCheckDriver'])){
        $s_uid = $_POST['idUnCheckDriver'];
        $sql_check_driver = "UPDATE tbl_driver SET status=0 WHERE id=".$s_uid;
        if(execute($sql_check_driver)){
            echo json_encode(array('message' => 'Thành công!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }

    }

    if(isset($_POST['id_truck_update']) && isset($_POST['date_update'])){
        $s_id_truck_update = $_POST['id_truck_update'];
        $s_date_update = $_POST['date_update'];
        $sql_update_date_truck = "UPDATE tbl_truck SET date_registery_expried='$s_date_update' WHERE id='$s_id_truck_update'";
        if(execute($sql_update_date_truck)){
            echo json_encode(array('message' => 'Thành công!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }
    }

    if(isset($_POST['name_truck']) && isset($_POST['license_plate_truck'])){
        $s_name_truck = $_POST['name_truck'];
        $s_license_plate_truck = $_POST['license_plate_truck'];
        $s_weight = $_POST['weight'];
        $s_weight_max = $_POST['weight_max'];
        $s_date_start = $_POST['date_start'];
        $s_date_end = $_POST['date_end'];
        $sql_add_truck = "INSERT INTO tbl_truck (name, license_plate, height, max_weight, date_registery, date_registery_expried, status) VALUE ('$s_name_truck', '$s_license_plate_truck', '$s_weight', '$s_weight_max', '$s_date_start', '$s_date_end', '0')";
        if(execute($sql_add_truck)){
            echo json_encode(array('message' => 'Thành công!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }
    }

    function getDriverById($id){
        return executeResult("SELECT * FROM tbl_driver WHERE id=".$id)[0];
    }

    function getTruckById($id){
        return executeResult("SELECT * FROM tbl_truck WHERE id=".$id)[0];
    }

    function getTransportById($id){
        return executeResult("SELECT * FROM tbl_transport WHERE id=".$id)[0];
    }

    if(isset($_POST['id_transport_update']) && isset($_POST['date_end'])){
        $s_id_transport_update = $_POST['id_transport_update'];
        $s_date_end = $_POST['date_end'];
        $s_flue = $_POST['flue'];
        $s_price_flue = $_POST['price_flue'];

        $id_truck_need_update = getTruckById(getTransportById($s_id_transport_update) -> id_truck);
        $id_driver_need_update = getDriverById(getTransportById($s_id_transport_update) -> id_driver);
//        execute("UPDATE tbl_truck SET status = 0 WHERE id = '$id_truck_need_update'");
//        execute("UPDATE tbl_driver SET status_work = 0 WHERE  id = '$id_driver_need_update'");
        $sql_update_transport = "UPDATE tbl_transport SET date_stop='$s_date_end', fuel='$s_flue', price_flue='$s_price_flue', status = 1 WHERE id='$s_id_transport_update'";
        if(execute($sql_update_transport)){
            echo json_encode(array('message' => 'Đã cập nhật vào lịch sử di chuyển!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }
    }

    if(isset($_POST['date_start_new']) && isset($_POST['id_place_start'])){
        $s_date_start_new = $_POST['date_start_new'];
        $s_id_place_start = $_POST['id_place_start'];
        $s_id_place_stop = $_POST['id_place_stop'];
        $s_id_driver = $_POST['id_driver'];
        $s_id_truck = $_POST['id_truck'];
        $sql_add_transport = "INSERT INTO tbl_transport (id_start_place, id_stop_place, id_driver, id_truck, date_start, status) VALUE ('$s_id_place_start', '$s_id_place_stop', '$s_id_driver', '$s_id_truck', '$s_date_start_new', '0')";
        execute("UPDATE tbl_truck SET status = 1 WHERE  id = '$s_id_truck'");
        execute("UPDATE tbl_driver SET status_work = 1 WHERE  id = '$s_id_driver'");
        if(execute($sql_add_transport)){
            echo json_encode(array('message' => 'Thành công!'));
        }
        else{
            echo json_encode(array('message' => 'Đã có lỗi xảy ra!'));
        }
    }
}
