<?php
include_once('../until/dbhelp.php');

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
                <h2 class="fs-2 m-0">Kiểm kê</h2>
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
            <div class="row">
                <div class="col-md-6" style="margin-top: 2rem">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                    </div>

                </div>

                <div class="col-md-6" style="margin-top: 2rem">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                    </div>
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

    var xValues1 = ["Số Xe", "Số tài xế"];
    var yValues1 = [<?php echo getCountTruck()?>, <?php echo getCountDriver()?>];
    var barColors1 = [
        "#b91d47",
        "#00aba9"
    ];

    new Chart("myChart", {
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
                text: "Thống kê số xe/số tài xế"
            }
        }
    });

    var xValues2 = ["Tài xế chưa KD", "Tài xế đã kiểm duyệt"];
    var yValues2 = [<?php echo getCountDriverUnActive()?>, <?php echo getCountDriverActive()?>];
    var barColors2 = [
        "#1d41b9",
        "#dabf65"
    ];

    new Chart("myChart2", {
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
                text: "Thống kê số tài xế chưa kiểm duyệt/số tài xế đã kiểm duyệt"
            }
        }
    });
</script>
</body>

</html>
