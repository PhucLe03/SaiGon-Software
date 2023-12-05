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
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            $title = "Quản lý tài khoản Khách hàng";
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
            <h1>Quản lý tài khoản Khách hàng</h1>
            <div class="container-fluid">
                <a href="/admin" class="text-decoration-none">
                    Quay lại
                </a>
            </div>
            <?php
            $allUser = getAllUser($conn);
            ?>
            <div class="row">
                <div class="col card">
                    <div class="d-flex justify-content-center">
                        <h3>Danh sách tài khoản Khách hàng</h3>
                    </div>
                    <?php
                    if ($allUser != 0) {
                    ?>
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên đăng nhập</th>
                                    <th scope="col">Tên Khách hàng</th>
                                    <th scope="col">Số lần giao dịch</th>
                                    <th scope="col">Số dư tài khoản (VNĐ)</th>
                                    <th scope="col" colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($allUser as $sp) {
                                    $count = countUserTransacs($sp['username'],$conn);
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td scope="row"><?= $sp['username'] ?></td>
                                        <td scope="row">
                                            <?= $sp['fname']." ".$sp['lname'] ?>
                                        </td>
                                        <td scope="row"><?= $count ?></td>
                                        <td scope="row"><?= formatPrice($sp['balance']) ?></td>
                                        <td scope="row">
                                            <a href="editproduct.php?id=<?=$sp['username']?>">Sửa</a>
                                        </td>
                                        <td scope="row">
                                            <?php
                                                if (!checkBuying($sp['username'],$conn)) {
                                            ?>
                                            <a href="deleteproduct.php?id=<?=$sp['username']?>" style="color: red;">Xóa</a>
                                            <?php
                                            } else {
                                            ?>
                                            <a style="color: grey;">Xóa</a>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else { ?>
                        <div class="alert alert-info" role="alert">
                            Chưa có tài khoản Khách hàng.
                        </div>
                    <?php } ?>
                </div>
                <div class="col-5">
                    <form class="card" method="post" action="action/addcus.php">
                        <div class="d-flex justify-content-center">
                            <h3>Thêm tài khoản</h3>
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
                                    } else if ($err_stmt == "a") {
                                        $err = "Tên người dùng Khách hàng đã có trong danh sách";
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
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="fname" placeholder="" value="<?php
                                        if (isset($_SESSION['fname'])) {
                                            echo $_SESSION['fname']; unset($_SESSION['fname']);
                                        }
                                        ?>">
                                        <label class="form-label">Tên <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="lname" placeholder="" value="<?php
                                        if (isset($_SESSION['lname'])) {
                                            echo $_SESSION['lname']; unset($_SESSION['lname']);
                                        }
                                        ?>">
                                        <label class="form-label">Họ <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="uname" placeholder="" value="<?php
                                        if (isset($_SESSION['uname'])) {
                                            echo $_SESSION['uname']; unset($_SESSION['uname']);
                                        };
                                        ?>">
                                        <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="pass" placeholder="" value="<?php
                                        if (isset($_SESSION['pass'])) {
                                            echo $_SESSION['pass']; unset($_SESSION['pass']);
                                        };
                                        ?>">
                                        <label class="form-label">Mật khẩu <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
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