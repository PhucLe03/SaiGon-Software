<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";
include "./admin_ctl/admin.php";
if (isset($_SESSION['username'])) {
    if ($_SESSION['tucach'] != "Admin") {
        header("Location: ../login");
        exit;
    }
    $user = getAdminInfo($_SESSION['username'], $conn);
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: account.php");
        exit;
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            $title = "Thông tin tài khoản Khách hàng";
            include "../header.php";
            ?>
        </title>
        <?php include "../assets/global/global_css.php" ?>
    </head>

    <body>
        <?php
        include "../assets/global/global_nav.php";
        ?>
        <div class="container mt-5">
            <h1>Sửa thông tin tài khoản Khách hàng</h1>
            <div class="container-fluid">
                <a href="/admin/account.php" class="text-decoration-none">
                    Quản lý tài khoản Khách hàng
                </a>/ Sửa thông tin tài khoản Khách hàng
            </div>
            <?php
            $cus = getCusInfo($_GET['id'],$conn);
            ?>
            <div class="row">
                <div class="">
                    <form class="card" method="post" action="action/editkh.php">
                        <div class="d-flex justify-content-center">
                            <h3>Sửa thông tin tài khoản Khách hàng</h3>
                            <hr />
                        </div>
                        <div class="container-fluid">
                            <?php
                            // $err_stmt = $_GET['error'];
                            if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    $err_stmt = $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    if ($err_stmt == "m") {
                                        $err = "Các thông tin không được để trống";
                                    } else {
                                        // $err = "Đã có lỗi xảy ra";
                                        $err = $_SESSION['emess'];
                                        unset($_SESSION['emess']);
                                    }
                                    // echo $err;
                                    ?>
                                    <?= $err ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="" value="<?=$cus['username']?>" disabled>
                                        <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="fname" placeholder="" value="<?php
                                        if (!isset($_SESSION['fname'])){
                                            echo $cus['fname'];
                                        } else {
                                            echo $_SESSION['fname'];
                                            unset($_SESSION['fname']);
                                        }
                                        ?>">
                                        <label class="form-label">Tên <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="lname" placeholder="" value="<?php
                                        if (!isset($_SESSION['lname'])){
                                            echo $cus['lname'];
                                        } else {
                                            echo $_SESSION['lname'];
                                            unset($_SESSION['lname']);
                                        }
                                        ?>">
                                        <label class="form-label">Họ <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="byear" placeholder="" value="<?php
                                        if (!isset($_SESSION['byear'])){
                                            echo $cus['byear'];
                                        } else {
                                            echo $_SESSION['byear'];
                                            unset($_SESSION['byear']);
                                        }
                                        ?>">
                                        <label class="form-label">Năm sinh <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="pass" placeholder="" value="<?php
                                        if (!isset($_SESSION['pass'])){
                                            echo $cus['password'];
                                        } else {
                                            echo $_SESSION['pass'];
                                            unset($_SESSION['pass']);
                                        }
                                        ?>">
                                        <label class="form-label">Mật khẩu <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="" value="<?=formatPrice($cus['balance'])?>" disabled>
                                        <label class="form-label">Số dư tài khoản (VNĐ) <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                            <input name="uname" value="<?=$cus['username']?>" style="visibility: hidden;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "../footer.php"; ?>
    </body>

    </html>

<?php } else {
    header("Location: ../login");
    exit;
}
?>