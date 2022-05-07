<?php
include_once('../until/dbhelp.php');
include_once('../model/Transport.php');

function getPlaceById($id){
    return executeResult("SELECT * FROM tbl_place WHERE id=".$id)[0];
}

function getDriverById($id){
    return executeResult("SELECT * FROM tbl_driver WHERE id=".$id)[0];
}

function getNumberPhoneDriverById($id){
    return executeResult("SELECT * FROM tbl_user WHERE id=".getDriverById($id) -> id_user)[0] -> numberphone;
}

function getTruckById($id){
    return executeResult("SELECT * FROM tbl_truck WHERE id=".$id)[0];
}

function getTransportActive(){
    $listTransport = executeResult("SELECT * FROM tbl_transport WHERE status=1");

    foreach ($listTransport as $tran){
        $transport_item = new Transport(
            $tran -> id,
            getPlaceById($tran -> id_start_place) -> address_details,
            getPlaceById($tran -> id_stop_place) -> address_details,
            getDriverById($tran -> id_driver) -> name,
            getNumberPhoneDriverById($tran -> id_driver),
            getTruckById($tran -> id_truck) -> name,
            getTruckById($tran -> id_truck) -> license_plate,
            $tran -> date_stop
        );
        $listResult[] = $transport_item;
    }
    return $listResult;
}

function getTransportById($id){
    return executeResult("SELECT * FROM tbl_transport WHERE id=".$id)[0];
}

function getPriceFuel($idTransport){
    return getTransportById($idTransport) -> fuel * getTransportById($idTransport) -> price_flue;
}
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
                <h2 class="fs-2 m-0">Lịch Sử Di Chuyển</h2>
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
        <div class="container-fluid px-4">
            <div class="row my-5">
                <div class="row g-3 my-2">
                    <div class="col-md-6">
                        <h3 class="fs-4 mb-3" style="margin-left: 0.22rem">Các lịch trình thành công</h3>
                    </div>
                </div>

                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Điểm bắt đầu</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Điểm kết thúc</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tài xế</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">SĐT Tài xế</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tên xe</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Biển số xe</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Ngày kết thúc</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Chi Phí Nhiên Liệu</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Cập nhật lương LX</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $index = 1;
                        foreach (getTransportActive() as $transport) {
                            ?>
                            <tr>
                                <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getNamePlaceStart() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getNamePlaceEnd() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getNameDriver() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getNumberPhoneDriver() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getNameTruck() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= $transport -> getLicensePlateTruck() ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= date_format(date_create($transport -> getTimeStart()), 'd-m-Y') ?></td>
                                <td style="text-align: center; padding: 0.5rem;"><?= getPriceFuel($transport -> getId())?></td>
                                <td style="text-align: center; padding: 0.5rem;">
                                    <a onclick="showUpdateDateTransport(<?= $transport -> getId() ?>)" type="date" class="btn btn-info">Cập nhật</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>
<script>

</script>
