<?php
include_once('../until/dbhelp.php');
function getDriverActive(){
    $statusActive = 1;
    $sql1 = "SELECT * FROM tbl_driver WHERE status = ".$statusActive;
    return executeResult($sql1);
}
function getDriverUnActive()
{
    $statusUnActive = 0;
    $sql2 = "SELECT * FROM tbl_driver WHERE status = ".$statusUnActive;
    return executeResult($sql2);
}
$listDriverActive = getDriverActive();
$listDriverUnActive = getDriverUnActive();

//chart
function getCountTruck(){
    if(executeResult("SELECT * FROM tbl_truck") != null)
        return count(executeResult("SELECT * FROM tbl_truck"));
    else
        return 0;
}

function getCountTruckActive(){
    if(executeResult("SELECT * FROM tbl_truck") != null)
        return count(executeResult("SELECT * FROM tbl_truck WHERE date_registery_expried >  CURRENT_DATE"));
    else
        return 0;
}

function getCountTruckUnActive(){
    if(executeResult("SELECT * FROM tbl_truck") != null)
        return count(executeResult("SELECT * FROM tbl_truck WHERE date_registery_expried <  CURRENT_DATE"));
    else
        return 0;
}

function getCountTruckWait(){
    if(executeResult("SELECT * FROM tbl_truck WHERE date_registery_expried >  CURRENT_DATE AND status = 0 ") != null)
        return count(executeResult("SELECT * FROM tbl_truck WHERE date_registery_expried >  CURRENT_DATE AND status = 0 "));
    else
        return 0;
}

function getCountTruckUnWait(){
    if(executeResult("SELECT * FROM tbl_truck") != null)
        return count(executeResult("SELECT * FROM tbl_truck WHERE status = 1 "));
    else
        return 0;
}

function getCountTransport(){
    if(executeResult("SELECT * FROM tbl_transport") != null)
        return count(executeResult("SELECT * FROM tbl_transport"));
    else
        return 0;
}

function getCountTransportSuccess(){
    if(executeResult("SELECT * FROM tbl_transport") != null)
        return count(executeResult("SELECT * FROM tbl_transport WHERE status = 1"));
    else
        return 0;
}

function getCountTransportUnSuccess(){
    if(executeResult("SELECT * FROM tbl_transport") != null)
        return count(executeResult("SELECT * FROM tbl_transport WHERE status = 0"));
    else
        return 0;
}

function getCountDriverUnActive(){
    if(executeResult("SELECT * FROM tbl_driver WHERE status = 0") != null)
        return count(executeResult("SELECT * FROM tbl_driver WHERE status = 0"));
    else
        return 0;
}

function getCountDriverActive(){
    if(executeResult("SELECT * FROM tbl_driver WHERE status = 1") != null)
        return count(executeResult("SELECT * FROM tbl_driver WHERE status = 1"));
    else
        return 0;
}

function getCountDriver(){
    if(executeResult("SELECT * FROM tbl_driver") != null)
        return count(executeResult("SELECT * FROM tbl_driver"));
    else
        return 0;
}

function getDriverNotWork(){
    return count(executeResult("SELECT * FROM tbl_driver WHERE status_work = 0 AND status = 1"));
}

function getDriverWork(){
    return count(executeResult("SELECT * FROM tbl_driver WHERE status_work = 1"));
}
$y1 = getCountTruck();
$y2 = getCountTruckUnActive();
$y3 = getCountTruckActive();
$y4 = getCountTruckWait();
$y5 = getCountTruckUnWait();
$y6 = getCountDriver();
$y7 = getCountDriverUnActive();
$y8 = getCountDriverActive();
$y9 = getDriverWork();
$y10 = getDriverNotWork();
$y11 = getCountTransport();
$y12 = getCountTransportSuccess();
$y13 = getCountTransportUnSuccess();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
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
                <h2 class="fs-2 m-0">Quản lí lái xe</h2>
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

        <div id="modal_check_driver" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kiểm duyệt lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Hãy chắc chắn rằng các thông tin mà lái xe này cung cấp là đúng nhé!</p>
                    </div>
                    <div class="modal-footer">
                        <button onclick="PostCheckDriver()" type="submit" id="btn_check_driver" class="btn btn-primary">Duyệt</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal_uncheck_driver" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bỏ duyệt lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Hãy chắc chắn rằng bạn bỏ duyệt lái xe này nhé!</p>
                    </div>
                    <div class="modal-footer">
                        <button onclick="PostUnCheckDriver()" type="submit" class="btn btn-primary">Bỏ duyệt</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4" style="margin-bottom: 2rem">
            <div class="row">
                <div class="p-6 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="padding: 2rem">
                    <div id="myChartOne" style="height: 350px; width: 100%;"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4" style="margin-top: 2rem">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <canvas id="myChartThree" style="height: 350px; width: 100%;"></canvas>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 2rem">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <canvas id="myChartTwo" style="height: 350px; width: 100%;"></canvas>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 2rem">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <canvas id="myChartFour" style="height: 350px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row my-5">
                <h3 class="fs-4 mb-3">Danh sách lái xe chờ kiểm duyệt </h3>
                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Họ và tên</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tuổi</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Địa chỉ</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Bằng lái</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Duyệt lái xe</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($listDriverUnActive as $driver) {
                                ?>
                                <tr>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> name ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> age ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> address ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> driver_license ?></td>
                                    <td style="text-align: center; padding: 0.5rem;">
                                        <button name="check" class="btn btn-success" onclick="CheckDriver(<?= $driver -> id ?>)">Duyệt LX</button>
                                    </td>
                                    <td style="text-align: center; padding: 0.5rem;">
                                        <a href="details_driver.php?id=<?= $driver -> id ?>" type="button" class="btn btn-info">Chi tiết</a>
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
                <h3 class="fs-4 mb-3">Danh sách lái xe đã kiểm duyệt </h3>
                <div class="col" style="margin-top: 1rem;">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center; padding: 1rem;">STT</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Họ và tên</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tuổi</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Địa chỉ</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Bằng lái</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Tình trạng</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Bỏ Duyệt lái xe</th>
                            <th scope="col" style="text-align: center; padding: 1rem;">Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            foreach ($listDriverActive as $driver) {
                                $status_driver = "Đang rảnh";
                                if($driver -> status_work == 1){
                                    $status_driver = "Đang lái";
                                }
                                ?>
                                <tr>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $index++ ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> name ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> age ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> address ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $driver -> driver_license ?></td>
                                    <td style="text-align: center; padding: 0.5rem;"><?= $status_driver ?></td>
                                    <td style="text-align: center; padding: 0.5rem;">
                                        <button name="check" class="btn btn-danger" onclick="UnCheckDriver(<?= $driver -> id ?>)">Bỏ Duyệt</button>
                                    </td>
                                    <td style="text-align: center; padding: 0.5rem;">
                                        <a href="details_driver.php?id=<?= $driver -> id ?>" type="button" class="btn btn-info">Chi tiết</a>
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

<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");
    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };

    var idCheckDriver = 0
    var idUnCheckDriver = 0
    function CheckDriver(id){
        idCheckDriver = id;
        $('#modal_check_driver').modal('show');
    }

    function UnCheckDriver(id){
        idUnCheckDriver = id;
        $('#modal_uncheck_driver').modal('show');
    }

    function PostCheckDriver(){
        $.ajax({
            type: 'POST',
            url : '../controller/AdminController.php',
            data: {idCheckDriver : idCheckDriver},
            success: function (data){
                const jsonData = JSON.parse(data);
                $('#modal_check_driver').modal('hide');
                alert(jsonData.message)
                location.reload()
            }
        });
    }

    function PostUnCheckDriver(){
        $.ajax({
            type: 'POST',
            url : '../controller/AdminController.php',
            data: {idUnCheckDriver : idUnCheckDriver},
            success: function (data){
                const jsonData = JSON.parse(data);
                $('#modal_uncheck_driver').modal('hide');
                alert(jsonData.message)
                location.reload()
            }
        });
    }

</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
    window.onload = function () {
        CanvasJS.addColorSet("greenShades",
            [
                "#2F4F4F",
                "#2F4F4F",
                "#2F4F4F",
                "#b9dada",
                "#658a8a",
                "#90EE90",
                "#6dda65",
                "#90EE90",
                "#83ce7d",
                "#aec9ac",
                "#0947cb",
                "#8094d5",
                "#1d41b9",
            ]);
        var chart = new CanvasJS.Chart("myChartOne", {
            animationEnabled: true,
            theme: "light2",
            colorSet: "greenShades",
            title:{
                text: "Các chỉ số chung"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Dữ liệu truy xuất",
                dataPoints: [
                    { y: <?php echo $y1?>, label: "Tổng xe hiện tại" },
                    { y: <?php echo $y2?>,  label: "Xe hết hạn đăng kiểm" },
                    { y: <?php echo $y3?>,  label: "Xe còn đăng kiểm" },
                    { y: <?php echo $y4?>,  label: "Xe chờ lái" },
                    { y: <?php echo $y5?>,  label: "Xe đang chạy" },
                    { y: <?php echo $y6?>, label: "Tổng tài xế hiện tại" },
                    { y: <?php echo $y7?>, label: "Tài xế chưa kiểm duyệt" },
                    { y: <?php echo $y8?>, label: "Tài xế đã kiểm duyệt" },
                    { y: <?php echo $y9?>, label: "Tài xế đang lái" },
                    { y: <?php echo $y10?>, label: "Tài xế đang chờ việc" },
                    { y: <?php echo $y11?>, label: "Tổng số lịch trình" },
                    { y: <?php echo $y12?>, label: "Lịch trình thành công" },
                    { y: <?php echo $y13?>, label: "Lịch trình đang diễn ra" },
                ]
            }]
        });
        chart.render();

        var xValues1 = ["Tài xế chờ việc (%)", "Tài xế đang lái (%)", "Tài xế chờ xác nhận (%)"];
        var yValues1 = [<?php echo intval($y10/$y6 * 100)?>, <?php echo intval($y9/$y6 * 100)?>,  <?php echo intval($y7/$y6 * 100)?>];
        var barColors1 = [
            "#aec9ac",
            "#83ce7d",
            "#6dda65"
        ];

        new Chart("myChartTwo", {
            type: "pie",
            data: {
                labels: xValues1,
                datasets: [{
                    backgroundColor: barColors1,
                    data: yValues1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Driver"
                }
            }
        });

        var xValues = ["Xe chờ lái (%)", "Xe đang chạy (%)", "Xe hết hạn đăng kiểm (%)"];
        var yValues = [<?php echo intval($y4/$y1 * 100)?>, <?php echo intval($y5/$y1 * 100)?>,  <?php echo intval($y2/$y1 * 100)?>];
        var barColors = [
            "#b9dada",
            "#658a8a",
            "#2F4F4F"
        ];

        new Chart("myChartThree", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Truck"
                }
            }
        });

        var xValues2 = ["Lịch trình đang diễn ra (%)", "Lịch trình thành công (%)"];
        var yValues2 = [<?php echo intval(($y13/$y11 * 100))?>, <?php echo intval(($y12/$y11 * 100))?>];
        var barColors2 = [
            "#1d41b9",
            "#8094d5"
        ];

        new Chart("myChartFour", {
            type: "pie",
            data: {
                labels: xValues2,
                datasets: [{
                    backgroundColor: barColors2,
                    data: yValues2
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Transport"
                }
            }
        });
    }
</script>
