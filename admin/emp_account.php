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
            $title = "Xem tài khoản Nhân viên";
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
            <h1>Xem tài khoản Nhân viên</h1>
            <div class="container-fluid">
                <a href="/admin" class="text-decoration-none">
                    Quay lại
                </a>
            </div>
            <?php
            $allAdmin = getAllAdmin($conn);
            ?>
            <div class="row">
                <div class="col card">
                    <div class="d-flex justify-content-center">
                        <h3>Danh sách tài khoản Nhân viên</h3>
                    </div>
                    <?php
                    if ($allAdmin != 0) {
                    ?>
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên đăng nhập</th>
                                    <th scope="col">Tên Nhân viên</th>
                                    <th scope="col">Năm sinh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($allAdmin as $sp) {
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
                                        <td scope="row"><?= $sp['byear'] ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else { ?>
                        <div class="alert alert-info" role="alert">
                            Chưa có tài khoản Nhân viên.
                        </div>
                    <?php } ?>
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