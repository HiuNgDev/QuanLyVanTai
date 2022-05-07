<?php
include_once('../until/dbhelp.php');
function getTruckActive(){
    $sql1 = "SELECT * FROM tbl_truck WHERE date_registery_expried >  CURRENT_DATE";


    return executeResult($sql1);
}
function getTruckUnActive(){
    $sql2 = "SELECT * FROM tbl_truck WHERE date_registery_expried <  CURRENT_DATE";
    return executeResult($sql2);
}
function getPlace(){
    $sql3 = "SELECT * FROM tbl_place";
    return executeResult($sql3);
}
$listTruckActive = getTruckActive();
$listTruckUnActive = getTruckUnActive();
$listPlace = getPlace();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <?php include 'sidebar.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background: #EDEFFF;">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Bãi Đỗ Và Xe
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" style="background: black;">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#setting">Cài đặt</a></li>
                            <li><a class="dropdown-item" href="../index.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="modal_update_date_truck" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cập nhật ngày đăng kiểm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" autocomplete="off" name="date_update-sheet" id="form_date">
                            <label for="date_update">Chọn ngày:</label>
                            <input type="date" id="date_update" name="date_update" required>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_add_truck" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm xe mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" autocomplete="off" name="add-truck-sheet" id="form_signup">
                            <div class="row" style="margin-top: 1rem">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name_truck"
                                           placeholder="Tên xe(*)" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="license_plate" placeholder="Biển số xe(*)"
                                           required/>
                                </div>
                            </div>

                            <div class="row"  style="margin-top: 1rem">
                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control" id="weight"
                                           placeholder="Khối lượng xe(*)" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="number" class="form-control" id="weight_max" placeholder="Khối lượng tối đa(*)"
                                           required/>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 1rem">
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="date_start"
                                           placeholder="Ngày bắt đầu đăng kiểm(*)" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="date-end"
                                           placeholder="Ngày hết hạn đăng kiểm(*)" required/>
                                </div>
                            </div>

                            <div style="text-align: right; margin-top: 1rem">
                                <button type="submit" class="btn btn-primary modal-submit">THÊM</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row my-5">
                <div class="row g-3 my-2">
                    <div class="col-md-6">
                        <h3 class="fs-4 mb-3" style="margin-left: 0.22rem">Danh sách xe trong thời gian đăng kiểm</h3>
                    </div>

                    <div class="col-md-6" style="text-align: right">
                        <button onclick="showAddTruck()" style="color: black;padding: 0.7rem; font-weight: bold;font-size: 14px;background: #9A9DFA; cursor: pointer; border-color: #1E2561; border-radius: 2rem" >Thêm xe mới</button>
                    </div>
                </div>
                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tên</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Biển số</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Khối lượng tối đa(tấn)</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tình trạng</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Ngày hết hạn đăng kiểm</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $index = 1;
                        foreach ($listTruckActive as $truck_active) {
                            $status_truck = "Đang chạy";
                            if($truck_active -> status == 0) $status_truck = "Đang chờ"
                            ?>
                            <tr>
                                <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck_active ->name ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck_active -> license_plate ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck_active -> max_weight ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $status_truck ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= date_format(date_create($truck_active -> date_registery_expried), 'd-m-Y')  ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row my-5">
                <h3 class="fs-4 mb-3">Danh sách xe chờ đăng kiểm</h3>
                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tên</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Biển số</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Khối lượng tối đa</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tình trạng</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Ngày hết hạn đăng kiểm</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Cập nhật</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $index = 1;
                        foreach ($listTruckUnActive as $truck) {
                            $status_truck = "Đang chạy";
                            if($truck -> status == 0) $status_truck = "Đang chờ"
                            ?>
                            <tr>
                                <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck ->name ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck -> license_plate ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $truck -> max_weight ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $status_truck ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= date_format(date_create($truck -> date_registery_expried), 'd-m-Y')  ?></td>
                                <td style="text-align: center; padding: 0.5rem;">
                                    <a onclick="showUpdateDateTruck(<?= $truck -> id ?>)" type="date" class="btn btn-warning">Cập nhật</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row my-5">
                <div class="row g-3 my-2">
                    <div class="col-md-6">
                        <h3 class="fs-4 mb-3" style="margin-left: 0.22rem">Danh sách các điểm đỗ</h3>
                    </div>

                    <div class="col-md-6" style="text-align: right">
                        <button onclick="showAddPlace()" style="color: black;padding: 0.7rem; font-weight: bold;font-size: 14px;background: #9A9DFA; cursor: pointer; border-color: #1E2561; border-radius: 2rem" >Thêm điểm đỗ mới</button>
                    </div>
                </div>
                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tỉnh</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Địa điểm chi tiết</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Code</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Xoá</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $index = 1;
                        foreach ($listPlace as $place) {
                            ?>
                            <tr>
                                <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $place ->province ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $place -> address_details ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $place -> code ?></td>
                                <td style="text-align: center; padding: 0.5rem;">
                                    <button name="check" class="btn btn-danger" onclick="DeletePlace(<?= $place -> id ?>)">Xoá</button>
                                </td>
                                <td style="text-align: center; padding: 0.5rem;">
                                    <a href="details_place.php?id=<?= $place -> id ?>" type="button" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");
    var idTruckUpdate = 0;

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };

    function showUpdateDateTruck(id){
        idTruckUpdate = id;
        $('#modal_update_date_truck').modal('show');
    }

    const formUpdateDateTruck = document.forms['date_update-sheet']
    formUpdateDateTruck.addEventListener('submit', e => {
        e.preventDefault()
        const date_update = $('#date_update').val();
        $.ajax({
            type: 'POST',
            url : '../controller/AdminController.php',
            data: {id_truck_update : idTruckUpdate, date_update : date_update},
            success: function (data){
                const jsonData = JSON.parse(data);
                $('#modal_update_date_truck').modal('hide');
                alert(jsonData.message)
                location.reload()
            }
        });
    })

    function showAddTruck(){
        $('#modal_add_truck').modal('show');
    }

    const formAddTruck = document.forms['add-truck-sheet']
    formAddTruck.addEventListener('submit', e => {
        e.preventDefault()
        const name_truck = $('#name_truck').val();
        const license_plate_truck = $('#license_plate').val();
        const weight = $('#weight').val();
        const weight_max = $('#weight_max').val();
        const date_start = $('#date_start').val();
        const date_end = $('#date-end').val();
        $.ajax({
            type: 'POST',
            url : '../controller/AdminController.php',
            data: {name_truck : name_truck, license_plate_truck : license_plate_truck, weight : weight, weight_max : weight_max, date_start : date_start, date_end : date_end},
            success: function (data){
                const jsonData = JSON.parse(data);
                $('#modal_add_truck').modal('hide');
                alert(jsonData.message)
                location.reload()
            }
        });
    })

    function showAddPlace(){

    }

    function DeletePlace(id){

    }
</script>
</body>

</html>
