<?php
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 'admin'){
        header('../view/admin.php');
    }
    else{
        header('Location: ../index.php');
    }
}
else{
    header('Location: ../index.php');
}
include_once('../until/dbhelp.php');
include_once('../model/Transport.php');
function getCountDriver(){
    if(executeResult("SELECT * FROM tbl_driver") != null)
        return count(executeResult("SELECT * FROM tbl_driver"));
    else
        return 0;
}

function getCountTruck(){
    if(executeResult("SELECT * FROM tbl_truck") != null)
        return count(executeResult("SELECT * FROM tbl_truck"));
    else
        return 0;
}

function getCountTransport(){
    if(executeResult("SELECT * FROM tbl_transport") != null)
        return count(executeResult("SELECT * FROM tbl_transport"));
    else
        return 0;
}

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
    $listTransport = executeResult("SELECT * FROM tbl_transport WHERE status=0");

    foreach ($listTransport as $tran){
        $transport_item = new Transport(
            $tran -> id,
            getPlaceById($tran -> id_start_place) -> address_details,
            getPlaceById($tran -> id_stop_place) -> address_details,
            getDriverById($tran -> id_driver) -> name,
            getNumberPhoneDriverById($tran -> id_driver),
            getTruckById($tran -> id_truck) -> name,
            getTruckById($tran -> id_truck) -> license_plate,
            $tran -> date_start
        );
        $listResult[] = $transport_item;
    }
    return $listResult;
}

function getDriverNotWork(){
    return executeResult("SELECT * FROM tbl_driver WHERE status_work = 0 AND status = 1");
}

function getTruckNotWork(){
    return executeResult("SELECT * FROM tbl_truck WHERE status = 0 AND date_registery_expried >  CURRENT_DATE");
}

function getAllPlace(){
    return executeResult("SELECT * FROM tbl_place");
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
                    <h2 class="fs-2 m-0">Trang chủ</h2>
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

            <div id="modal_update_transport" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cập nhật lịch trình</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" name="update-transport-sheet" id="form_update_transport">
                                <div class="row" style="margin-top: 1rem">
                                    <div class="form-group col-md-6" style="padding: 1rem">
                                        Ngày kết thúc
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control" id="date_end"
                                               placeholder="Ngày kết thúc(*)" required>
                                    </div>
                                </div>

                                <div class="row"  style="margin-top: 1rem">
                                    <div class="form-group col-md-6">
                                        <input type="number" class="form-control" id="flue"
                                               placeholder="Số nhiên liệu đã sử dụng(*)" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="number" class="form-control" id="price_flue" placeholder="Giá trị tiền/ĐV(*)"
                                               required/>
                                    </div>
                                </div>

                                <div style="text-align: right; margin-top: 1rem">
                                    <button type="submit" class="btn btn-primary modal-submit">CẬP NHẬT</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal_add_transport" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm lịch trình</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" name="add-transport-sheet" id="form_add_transport">
                                <div class="row" style="margin-top: 1rem">
                                    <div class="form-group col-md-6" style="padding: 1rem">
                                        Ngày bắt đầu
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control" id="date_start_new"
                                               placeholder="Ngày bắt đầu(*)" required>
                                    </div>
                                </div>

                                <div class="row"  style="margin-top: 1rem">
                                    <div class="form-group col-md-6">
                                        <select id="place_start_new" class="form-select" required>
                                            <option selected>Chọn điểm bắt đầu</option>
                                            <?php
                                            foreach (getAllPlace() as $place){
                                            ?>
                                                <option value=<?= $place -> id?>><?= $place -> address_details?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select id="place_stop_new" class="form-select" required>
                                            <option selected>Chọn điểm kết thúc</option>
                                            <?php
                                            foreach (getAllPlace() as $place){
                                                ?>
                                                <option value=<?= $place -> id?>><?= $place -> address_details?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row"  style="margin-top: 1rem">
                                    <div class="form-group col-md-6">
                                        <select id="driver_new" class="form-select" required>
                                            <option selected>Chọn tài xế</option>
                                            <?php
                                            foreach (getDriverNotWork() as $driver){
                                                ?>
                                                <option value=<?= $driver -> id?>><?= $driver -> name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select id="truck_new" class="form-select" required>
                                            <option selected>Chọn xe</option>
                                            <?php
                                            foreach (getTruckNotWork() as $truck){
                                                ?>
                                                <option value=<?= $truck -> id?>><?= $truck -> name?></option>
                                            <?php } ?>
                                        </select>
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
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 style="text-align: center" class="fs-2"><?php echo getCountTruck()?></h3>
                                <p class="fs-5">Xe chạy</p>
                            </div>
                            <i class="fas fa-bus fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 style="text-align: center" class="fs-2"><?php echo getCountDriver()?></h3>
                                <p class="fs-5">Tài xế</p>
                            </div>
                            <i class="fas fa-user-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 style="text-align: center" class="fs-2"><?php echo getCountTransport()?></h3>
                                <p class="fs-5">Lịch trình</p>
                            </div>
                            <i class="fas fa-sort-amount-up-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">25%</h3>
                                <p class="fs-5">Doanh thu</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="row g-3 my-2">
                        <div class="col-md-6">
                            <h3 class="fs-4 mb-3" style="margin-left: 0.22rem">Lịch trình đang diễn ra</h3>
                        </div>

                        <div class="col-md-6" style="text-align: right">
                            <button onclick="AddTransport()" style="color: black;padding: 0.7rem; font-weight: bold;font-size: 14px;background: #9A9DFA; cursor: pointer; border-color: #1E2561; border-radius: 2rem" >Thêm mới</button>
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
                                <th scope="col" style="text-align: center; padding: 1rem;">Ngày bắt đầu</th>
                                <th scope="col" style="text-align: center; padding: 1rem;">Chức năng</th>
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
                                    <td style="text-align: center; padding: 0.5rem;">
                                        <a onclick="showUpdateDateTransport(<?= $transport -> getId() ?>)" type="date" class="btn btn-warning">Cập nhật</a>
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

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };


        var idUpdateTransport = 0
        function showUpdateDateTransport(id){
            idUpdateTransport = id;
            $('#modal_update_transport').modal('show');
        }

        const formUpdateDateTransport = document.forms['update-transport-sheet']
        formUpdateDateTransport.addEventListener('submit', e => {
            e.preventDefault()
            const date_end = $('#date_end').val();
            const flue = $('#flue').val();
            const price_flue = $('#price_flue').val();
            $.ajax({
                type: 'POST',
                url : '../controller/AdminController.php',
                data: {id_transport_update : idUpdateTransport, date_end : date_end, flue : flue, price_flue : price_flue},
                success: function (data){
                    const jsonData = JSON.parse(data);
                    $('#modal_update_transport').modal('hide');
                    alert(jsonData.message)
                    location.reload()
                }
            });
        })

        function AddTransport(){
            $('#modal_add_transport').modal('show');
        }

        const formAddTransport = document.forms['add-transport-sheet']
        formAddTransport.addEventListener('submit', e => {
            e.preventDefault()
            const date_start_new = $('#date_start_new').val();
            const id_place_start = $('#place_start_new').val();
            const id_place_stop = $('#place_stop_new').val();
            const id_driver = $('#driver_new').val();
            const id_truck = $('#truck_new').val();
            $.ajax({
                type: 'POST',
                url : '../controller/AdminController.php',
                data: {date_start_new : date_start_new, id_place_start : id_place_start, id_place_stop : id_place_stop, id_driver : id_driver, id_truck : id_truck},
                success: function (data){
                    const jsonData = JSON.parse(data);
                    $('#modal_update_transport').modal('hide');
                    alert(jsonData.message)
                    location.reload()
                }
            });
        })
    </script>
    </body>

</html>
