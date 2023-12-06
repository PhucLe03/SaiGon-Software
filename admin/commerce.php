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
            $title = "Quản lý mua hàng";
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
            <h1>Quản lý mua hàng</h1>
            <div class="container-fluid">
                <a href="/admin" class="text-decoration-none">
                    Quay lại
                </a>
            </div>
            <?php
            $allTS = getAllBuy($conn);
            ?>
            <div class="row">
                <div class="col card">
                    <div class="d-flex justify-content-center">
                        <h3>Danh sách giao dịch</h3>
                    </div>
                    <?php
                    if ($allTS != 0) {
                    ?>
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Tên Khách hàng</th>
                                    <th scope="col">Sản phẩm đã mua</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Số tiền thu được</th>
                                    <th scope="col">Thời gian giao dịch</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($allTS as $ts) {
                                    $cus = getCusInfo($ts['username'],$conn);
                                    $cusname = $cus['fname']." ".$cus['lname'];
                                    $prod = getProductByID($ts['productA'],$conn);
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td scope="row"><?= $ts['username'] ?></td>
                                        <td scope="row">
                                            <a href="/admin/viewaccount.php?id=<?=$ts['username']?>">
                                                <?= $cusname ?>
                                            </a>
                                        </td>
                                        <td scope="row">
                                            <a href="/product/detail.php?id=<?=$ts['productA']?>">
                                                <?= $prod['prName'] ?>
                                            </a>
                                        </td>
                                        <td scope="row"><?= $ts['count'] ?></td>
                                        <td scope="row"><?= formatPrice($ts['cost']) ?></td>
                                        <td scope="row"><?= $ts['date_time'] ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else { ?>
                        <div class="alert alert-info" role="alert">
                            Chưa có giao dịch mua hàng.
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