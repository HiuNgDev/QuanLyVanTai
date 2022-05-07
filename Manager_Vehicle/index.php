<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="view/image/logo.png" />
        <title>Phần mềm vận tải quản lý vận hành tự động</title>
        <meta name="description"
            content="Phần mềm quản lý vận tải – điều phối xe tự động, quản lý tài xế tính lương- xăng dầu, tiết kiệm chi phí quản lý – Liên hệ : 0901676262">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid header-bg">
            <div class="row">
                <div class="col-md-6" style="height: 100%;" id="home">
                    <div class="header-bg-bg" style="margin-left: 9rem;margin-top: 6rem;">
                        <div>
                            <img style="width: 20%;margin-top: -1rem;" src="view/image/truck1.png" alt="truck">
                            <span style="font-size: 30px;color: white;">Logistic</span>
                        </div>

                        <div style="margin-top: 7rem;">
                            <div>
                                <h1 style="color: white;">GIẢI PHÁP QUẢN LÝ VẬN TẢI</h1>
                            </div>

                            <div style="margin-top: 2rem;">
                                <h2 style="font-size: 18px;color: white;margin-top: 2rem;">Điều phối tự động - Quản lý chi
                                    phí xăng dầu, cầu đường, <br />bãi - Tính lương tài xế - Tiết kiếm chi phí quản lý</h2>
                            </div>
                        </div>

                        <div class="header-app" style="margin-top:16px">
                            <div class="title__div">
                                <h1 style="color: white;">Tải App</h1>
                            </div>
                            <div class="image_app">
                                <a href="https://www.apple.com/app-store">
                                    <div class="image__app__store"><img src="view/image_svg/appstore.svg" alt="down load app Ios">
                                </a>

                                </div>
                                <a href="https://play.google.com/store">
                                    <div class="image__app__googleplay">
                                        <img src="view/image_svg/google.svg" alt="down load app Android">
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="modal_signup" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="modal-title modal-size"
                                    style="font-size: 30px;font-weight: 400;margin-left: 8rem;">HỖ TRỢ VÀ TƯ VẤN</span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #4145B8;" onclick="resetSignup()">&times;</span>
                                </button>
                            </div>

                            <span style="color: #BABDC7;text-align: center;padding: 10px;">Chào mừng bạn đến với dịch vụ của
                                chúng tôi! Bạn hãy hoàn thành những thông tin dưới dây để tạo tài khoản lái xe nhé!</span>
                            <div class="modal-body">
                                <form method="post" autocomplete="off" name="signup-sheet" id="form_signup">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Họ và tên(*)" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="age" placeholder="Tuổi(*)"
                                                   required/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="tel" class="form-control" id="numberphone_signup"
                                                placeholder="Số điện thoại(*)" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" id="password_signup" placeholder="Mật khẩu(*)"
                                                   required/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="driver_license"
                                                placeholder="Bằng lái loại(*)" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="salary"
                                                   placeholder="Mức lương mong muốn(*)" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" id="address" placeholder="Địa chỉ thường trú(*)"
                                               required/>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6" style="padding: 0.8rem">Chọn ảnh của bạn(*)</div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="file" id="image_avatar" multiple>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6" style="padding: 0.8rem">Chọn ảnh CCCD mặt trước(*)</div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="file" id="image_identification_front" multiple>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6" style="padding: 0.8rem">Chọn ảnh CCCD mặt sau(*)</div>
                                        <div class="form-group col-md-6">
                                            <input class="form-control" type="file" id="image_identification_back" multiple>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary modal-submit" style="margin-top: 1rem">ĐĂNG KÝ</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="model_login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #4145B8;" onclick="resetLogin()">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="margin-top: 1rem">
                                <form method="post" autocomplete="off" name="login-sheet" id="form_login">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="tel" id="numberphone" class="form-control" name="numberphone" placeholder="Số điện thoại(*)" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type = "password" id="password" class="form-control" name="password" placeholder="Mật khẩu(*)" required/>
                                        </div>
                                    </div>

                                    <button type="submit" name="login" id="btn_login" class="btn btn-primary modal-submit" style="margin-top: 1rem; margin-bottom: 1rem">ĐĂNG NHẬP</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 trangchu">
                    <div style="margin-top: 2rem; margin-right: 4rem; text-align: right">
                        <button style="color: white;padding: 0.7rem; font-weight: bold;font-size: 14px;background: transparent; cursor: pointer; border-color: #4145B8; border-radius: 0.4rem" onclick = "showLogin()">ĐĂNG NHẬP</button>
                        <button style="color: white;padding: 0.7rem; margin-left : 1rem; font-weight: bold;font-size: 14px;background: transparent; cursor: pointer; border-color: #4145B8; border-radius: 0.4rem" onclick="showSignUp()">ĐĂNG KÝ</button>
                    </div>

                    <div style="margin-top: 3rem;">
                        <a href="#home" style="color: white;font-weight: bold;font-size: 18px;cursor: pointer;">TRANG CHỦ</a>
                        <a href="#feature" style="color: white;font-weight: bold;font-size: 18px;margin-left: 2rem;cursor: pointer;">TÍNH NĂNG </a>
                        <a href="#benefit" style="color: white;font-weight: bold;font-size: 18px;margin-left: 2rem;cursor: pointer;">LỢI ÍCH</a>
                        <a href="#why" style="color: white;font-weight: bold;font-size: 18px;margin-left: 2rem;cursor: pointer;">VÌ SAO NÊN DÙNG?</a>
                    </div>

                    <div style="width:100%">
                        <img style="width: 100%;margin-left: -3rem;" src="view/image/maytinh2.png" alt="computer use">
                    </div>
                </div>

                <div class="col-md-6 trangchu1">
                    <nav class="navbar navbar-expand-lg fixed-top navbar-fixed-top navbar navbar-dark bg-dark"
                        style="background-color:black">
                        <button class="navbar-toggler" type="button" data-toggle="dropdown"
                            data-target="#navbarTogglerDemo02" aria-controls="navbarNavDropdown" aria-haspopup="true"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-white"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Trang chủ <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#feature">Tính năng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#benefit">Lợi ích</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#why">Vì sao nên dùng?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <h4 id="feature" style="color:#4145B8;text-align:center;font-size: 24px;font-weight: bold">TÍNH NĂNG CHÍNH</h4>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top:2rem;">
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 " style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/automation.svg" alt="automatic"><br />
                                    <span style="font-size:15px;color: white;">TỰ ĐỘNG HÓA</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Hệ thống tự phân phối đơn hàng theo khu vực, theo nhóm tuyến
                                            đường</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;" src="view/image_svg/chat.svg"
                                        alt="coordinator"><br />
                                    <span style="font-size:15px;color: white;">ĐIỀU PHỐI TỰ ĐỘNG</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Hệ thống tự đưa ra các gợi ý về phương án vận chuyển mang
                                            lại hiệu quả cao nhất</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/administration 1.svg" alt="administration"><br />
                                    <span style="font-size:15px;color: white;">QUẢN LÝ ĐỘI XE VÀ TÀI XẾ</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Tính lương tài xế, quản lý hồ sơ, lý lịch, thông tin chi
                                            tiết của xe và tài xế</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/placeholder 1.svg" alt="journey"><br />
                                    <span style="font-size:15px;color: white;">GIÁM SÁT HÀNH TRÌNH</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Cập nhật thông tin hành trình của từng xe theo thời gian
                                            thực thông qua GPS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 " style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;" src="view/image_svg/map 1.svg"
                                        alt="viewer"><br />
                                    <span style="font-size:15px;color: white;">THEO DÕI XE</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Theo dõi hoạt động xe của doanh nghiệp tại từng thời điểm,
                                            ứng với từng xe ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;" src="view/image_svg/app 1.svg"
                                        alt="connection app"><br />
                                    <span style="font-size:15px;color: white;">KẾT NỐI PHẦN MỀM</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Dễ dàng kết nối với các hệ thống phần mềm khác như kế toán,
                                            Nhân sự ...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/statistics 1.svg" alt="business"><br />
                                    <span style="font-size:15px;color: white;">KINH DOANH HIỆU QUẢ</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Quản lý thu, chi phí, lợi nhuận của từng chuyến chạy tại mọi
                                            thời điểm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/devices 1.svg" alt="divices"><br />
                                    <span style="font-size:15px;color: white;">ĐA DẠNG THIẾT BỊ</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Với kinh nghiệm lâu năm trong lĩnh vực Logstic, chúng tôi
                                            cam kết mang đến chất lượng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 " style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/maintenance 1.svg" alt="maintain"><br />
                                    <span style="font-size:15px;color: white;">BẢO TRÌ,BẢO DƯỠNG</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Theo dõi hoạt động bảo trì, bảo dưỡng đội xe. Cảnh báo đến
                                            hạn bảo trì, bảo dưỡng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/shopping-list 1.svg" alt="result"><br />
                                    <span style="font-size:15px;color: white;">KẾT QUẢ GIAO NHẬN</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">App tài xế ghi nhận kết quả giao/nhận hàng và giám sát lộ
                                            trình giao/nhận hàng mọi lúc, mọi nơi</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/warning-symbol 1.svg" alt="warning"><br />
                                    <span style="font-size:15px;color: white;">CẢNH BÁO TỨC THỜI</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Tự động cảnh báo đơn hàng trễ hạn giao/nhận. Cảnh báo đến
                                            hạn bảo trì/bảo dưỡng xe</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 two" style="margin:0px;">
                                <div style="text-align: center;background-color: #4145B8;border-radius: 10px;height: 100%;">
                                    <img style="width:30%;margin-top: 1.5rem;margin-bottom: 1rem;"
                                         src="view/image_svg/database 1.svg" alt="extention"><br />
                                    <span style="font-size:15px;color: white;">TÍCH HỢP KHÔNG GIỚI HẠN</span><br />
                                    <div style="margin: 1rem;">
                                        <span class="paragraph">Chia sẻ hành trình chuyến chạy thông qua APP, giúp Doanh
                                            nghiệp gia tăng kết nối với KH</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <img src="view/image/back.png" alt="previous slide">
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <img src="view/image/next.png" alt="next slide">
            </a>
        </div>
        <h4 id="benefit" style="color:#4145B8;text-align:center;font-size: 24px;font-weight: bold;margin-top: 4rem;">LỢI ÍCH CHUNG</h4>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top:4rem">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <img src="view/image/cube.png" alt="EASY ADMINISTRATION">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">QUẢN TRỊ DỄ DÀNG</span></br>
                                <span>Nâng cao năng lực quản trị tự động trong Doanh nghiệp</span>
                            </div>
                        </div>
                        <div class="col-md-6 mutual_benefit">
                            <div>
                                <img src="view/image/cube.png" alt="AUTOMATION">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">TỰ ĐỘNG HÓA</span></br>
                                <span>Tự động thao tác nghiệp vụ giúp giảm tối đa chi phí hoạt động kinh doanh của Doanh
                                    nghiệp</span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 3rem;">
                        <div class="col-md-6">
                            <div>
                                <img src="view/image/cube.png" alt="TRUST">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">SỰ TIN TƯỞNG</span></br>
                                <span>Gia tăng thêm niềm tin đối với dịch vụ của bạn</span>
                            </div>
                        </div>
                        <div class="col-md-6 mutual_benefit">
                            <div>
                                <img src="view/image/cube.png" alt="OPTIMAL">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">TỐI ƯU</span></br>
                                <span>Tối ưu kế hoạch điều phối vận chuyển</span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 3rem;">
                        <div class="col-md-6">
                            <div>
                                <img src="view/image/cube.png" alt="EFFECTIVE">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">HIỆU QUẢ</span></br>
                                <span>Thấy ngay hiệu quả kinh doanh của Doanh Nghiệp trên từng đơn hàng, từng lượt vận
                                    chuyển mọi lúc, mọi nơi</span>
                            </div>
                        </div>
                        <div class="col-md-6 mutual_benefit">
                            <div>
                                <img src="view/image/cube.png" alt="INCREASE CAPACITY">
                            </div>
                            <div style="margin-left: 3rem;margin-top: -1.5rem;">
                                <span style="font-size:18px;font-weight:600;color:#171717">NÂNG CAO NĂNG LỰC</span></br>
                                <span>Năng lực cạnh tranh với các đối thủ cùng ngành</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img style="width:100%" src="view/image/phone.png" alt="application">
                </div>
            </div>
        </div>
        <h4 id="why" style="color:#4145B8;text-align:center;font-size: 24px;font-weight: bold;margin-top: 4rem;">VÌ SAO NÊN CHỌN CHÚNG TÔI</h4>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img style="width:100%" src="view/image/xemay1.png" alt="speed">
                </div>
                <div class="col-md-6" style="margin-top: 7rem;">
                    <div style="display:flex;">
                        <div>
                            <img src="view/image/student.png" alt="experience" srcset="">
                        </div>
                        <div style="margin-left: 1.5rem;">
                            <span style="color:black;font-size:18px;font-weight:bold">Trên 5 năm kinh nghiệm</span></br>
                            <span>Với đội ngũ tư vấn giàu kinh nghiệm triển khai phần mềm trong lĩnh vực vận chuyển. Chúng
                                tôi đem đến cho doanh nghiệp của bạn những giải pháp tốt nhất</span>
                        </div>
                    </div>
                    <div style="display:flex;margin-top: 4rem;">
                        <div>
                            <img src="view/image/handshake.png" alt="dedicated service" srcset="">
                        </div>
                        <div style="margin-left: 1.5rem;">
                            <span style="color:black;font-size:18px;font-weight:bold">Tận tâm phục vụ</span></br>
                            <span>Phương châm phục vụ khách hàng của team :"Nhiệt huyết, trách nhiệm và luôn sẵn sàng hỗ trợ
                                24/7 ".</span>
                        </div>
                    </div>
                    <div style="display:flex;margin-top: 6rem;">
                        <div>
                            <img src="view/image/building.png" alt="Suitable for many businesses" srcset="">
                        </div>
                        <div style="margin-left: 1.5rem;">
                            <span style="color:black;font-size:18px;font-weight:bold">Phù hợp với nhiều doanh
                                nghiệp</span></br>
                            <span>Hệ thống phần mềm vận tải được xây dựng phù hợp với mô hình kinh doanh Doanh nghiệp vận
                                tải Việt Nam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4 style="color:#4145B8;text-align:center;font-size: 24px;font-weight: bold;margin-top: 4rem;">KHÁCH HÀNG CỦA CHÚNG TÔI</h4>
        <div class="container">
            <div class="row polygon" style="margin-top: 3rem;margin-left: 2rem;">
                <div class="col-md-3 ">
                    <div>
                        <img src="view/image_svg/Polygon 9.svg" alt="dhl" srcset="">
                    </div>
                    <div class="image-polygon"
                        style="background: url('view/image_svg/dhl.svg');height: 70px;width: 52%;margin-top: -10rem;position: absolute;margin-left: 1.5rem;">
                    </div>
                </div>
                <div class="col-md-3 polygoner">
                    <div>
                        <img src="view/image_svg/Polygon 9.svg" alt="vietname port" srcset="">
                    </div>
                    <div class="image-polygon"
                        style="background: url('view/image_svg/preview1.svg');height: 74px;width: 52%;margin-top: -10rem;position: absolute;margin-left: 1.5rem;">
                    </div>
                </div>
                <div class="col-md-3 polygoner">
                    <div>
                        <img src="view/image_svg/Polygon 9.svg" alt="GHN" srcset="">
                    </div>
                    <div class="image-polygon"
                        style="background: url('view/image_svg/giaohang.svg');height: 70px;width: 52%;margin-top: -10rem;position: absolute;margin-left: 1.5rem;">
                    </div>
                </div>
                <div class="col-md-3 polygoner">
                    <div>
                        <img src="view/image_svg/Polygon 9.svg" alt="viettel post" srcset="">
                    </div>
                    <div class="image-polygon"
                        style="background: url('view/image_svg/preview.svg');height: 70px;width: 52%;margin-top: -10rem;position: absolute;margin-left: 1.5rem;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-bg">
            <div class="container">
                <div class="row footer-row">
                    <div class="col-md-6" style="margin-top: 8rem;">
                        <span style="color: white;font-size: 24px;">VỀ CHÚNG TÔI</span></br>
                        <span style="margin-top: 2rem;color: white;">Phần mềm Vận tải Logistic - Giải pháp hàng đầu cho
                            Doanh Nghiệp Vận Tải Việt Nam</span>
                    </div>
                    <div class="col-md-6 footer-bg-div" style="margin-top: 8rem;">
                        <span style="color: white;font-size: 24px;">LIÊN HỆ</span></br>
                        <span style="margin-top: 1rem;color: white;">Địa chỉ : Khoa VT1 Học Viện Công Nghệ Bưu Chính Viễn
                            Thông, Nguyễn Trãi, Hà Nội</span></br>
                        <span style="margin-top: 1rem;color: white;">Hottline: (+84) 983397440</span></br>
                        <span style="margin-top: 1rem;color: white;">Email: contact@ptit.vn</span>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const formLogin = document.forms['login-sheet']
            formLogin.addEventListener('submit', e => {
                e.preventDefault()
                const numberphone = $('#numberphone').val();
                const password = $('#password').val();
                $.ajax({
                    type: 'POST',
                    url : 'controller/LoginController.php',
                    data: {numberphone : numberphone, password : password},
                    success: function (data){
                        const jsonData = JSON.parse(data);
                        if(jsonData.message == 'user'){
                            $('#modal_signup').modal('hide');
                            <?php $_SESSION['role'] = 'user'?>
                            window.location.href = 'view/user.php';
                        }
                        else if(jsonData.message == 'admin'){
                            $('#modal_signup').modal('hide');
                            <?php $_SESSION['role'] = 'admin'?>
                            window.location.href = 'view/admin.php';
                        }
                        else{
                            alert(jsonData.message)
                        }
                    }
                });
            })

            const formSignup = document.forms['signup-sheet']
            formSignup.addEventListener('submit', e =>{
                e.preventDefault()
                const name = $('#name').val();
                const numberphone = $('#numberphone_signup').val();
                const password = $('#password_signup').val();
                const driver_license = $('#driver_license').val();
                const salary = $('#salary').val();
                const address = $('#address').val();
                const age = $('#age').val();
                $.ajax({
                    type: 'POST',
                    url : 'controller/SignUpController.php',
                    data: {name : name, numberphone : numberphone, password : password, driver_license : driver_license, salary : salary, address : address, age: age},
                    success: function (data){
                        $('#modal_signup').modal('hide');
                        const jsonData = JSON.parse(data);
                        alert(jsonData.message)
                    }
                });
            })
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>

<script>
    function showLogin(){
        $('#model_login').modal('show');
    }

    function showSignUp(){
        $('#modal_signup').modal('show');
    }

    function resetLogin(){
        document.getElementById('form_login').reset();
    }

    function resetSignup(){
        document.getElementById('form_signup').reset();
    }
</script>