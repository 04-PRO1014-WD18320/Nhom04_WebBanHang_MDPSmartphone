<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="../images_giao_dien/logo.png" type="image/png" />
    <title>MDPsmartphone</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="float-left">
                            <p>Phone: +84 374659924</p>
                            <p>email: MDPsmartphone@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="float-right">
                            <div class="right_side">
                                <?php
                                if (isset($_SESSION['user'])) :
                                    extract($_SESSION['user']);
                                ?>
                                    <li><a href="../admin/">
                                            <?php
                                            if ($role == 1) {
                                                echo 'Tới trang quản trị';
                                            }
                                            ?>
                                        </a>
                                    </li>
                                    <li><a href="index.php?action=history">Lịch sử mua hàng</a></li>
                                    <li><a href="index.php?action=logout">Đăng xuất</a></li>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php">
                        <img src="../img/logo.jpg" style="height: 60px;" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?action=sanpham">Sản Phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">liên hệ</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <form class="form-inline" action="index.php?action=sanpham" method="POST">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" placeholder="Search" name="key-search">
                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-sm" type="submit" name="btn-search">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                    <li class="nav-item">
                                   
                                        <a href="index.php?action=giohang" class="icons" >
                                        
                                            <i class="ti-shopping-cart">
                                            
                                            </i>
                                        </a>
                                    </li>

                                    <li class="nav-item">

                                        <?php
                                        if (isset($_SESSION['user'])) {
                                        ?>
                                            <a data-toggle="modal" data-target="#sua-user"><img class="icons " src="../img/user/<?= $_SESSION['user']['image'] ?>" alt="" style="width: 30px; height:30px; border-radius: 100%; margin-right: -15px;cursor:pointer;"></a>
                                            <a data-toggle="modal" data-target="#sua-user" class="icons " style="cursor: pointer;"><?= $_SESSION['user']['user_name'] ?></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="login.php" class="icons">
                                                <i class="ti-user" aria-hidden="true"></i>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================Header Menu Area =================-->
    <!--MODAL sửa user BOOTSTRAP-->
    <div class="modal fade" id="sua-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="index.php?action=myacc" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        }
                        ?>
                        <div class="text-center" style="border-radius: 100%;">
                            <img src="../img/user/<?= $image ?>" alt="" style="width: 80px;" />
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $user_name ?>" name="user_name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $email ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $phone_number ?>" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $address ?>" name="add">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Hình ảnh:</label>
                            <input type="file" class="form-control" id="recipient-name" value="<?= $image?>" name=image>
                        </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_update_user" class="btn btn-primary">Lưu lại</button>
    </div>
    </div>
    </div>
    </form>
    </div>
    <!--MODAL sửa sản phẩm BOOTSTRAP-->