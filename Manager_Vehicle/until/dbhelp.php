<?php
include_once('../until/config.php');

/*
insert, update, delete
*/
function execute($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        return false;
    }
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    return true;
}

/*
select
*/
function executeResult($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        echo "Connection failed: " . mysqli_connect_error();
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    while ($obj = mysqli_fetch_object($result)){
        $list[] = $obj;
    }
    mysqli_close($conn);
    return $list;
}