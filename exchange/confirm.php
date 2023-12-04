<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";
include "../controllers/exchange_ctl.php";

if (isset($_SESSION['username']) && isset($_SESSION['tucach'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            $title = "Xác nhận trao đổi";
            include "../header.php";
            ?>
        </title>
        <?php include "../assets/global/global_css.php" ?>
    </head>

    <body>
        <?php include "../assets/global/global_nav.php";
        if ($_SESSION['tucach'] == "User") {
            $user = $_SESSION['username'];
            $info = getCusInfo($user, $conn);
            $real_balance = $info['balance'];
            $balance = formatPrice($real_balance);
        ?>
            <div class="container">
                <h1>Xác nhận trao đổi</h1>
                <div class="d-flex justify-content-center">
                    <h4>Số dư tài khoản: <?= $balance ?> VNĐ </h4>
                </div>
                <?php
                $items = getBoughtProd($user, $conn);
                if ($items != 0) {
                    $pro = getAllProducts($conn);
                    if ($pro == 0) {
                        exit;
                    }
                ?>
                    <form method="post" action="exchange/process_exchange.php">
                        <hr /> <br />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" list="bought" class="form-control" name="hh" placeholder="">
                                    <label class="form-label">Chọn mã hàng bạn đã mua <span style="color: red;">*</span></label>
                                    <datalist id="bought">
                                        <?php
                                        foreach ($items as $c) {
                                            $p = getProductByID($c['productID'],$conn);
                                            $v['pid'] = $c['productID'];
                                            $v['bid'] = $c['buyID'];
                                        ?>
                                            <option value="<?= $v['pid'].':'.$v['bid'] ?>"> <?= $p['prName'] ?> </option>

                                        <?php
                                        }
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" list="products" class="form-control" name="sp" placeholder="">
                                    <label class="form-label">Chọn mã sản phẩm muốn trao đổi <span style="color: red;">*</span></label>
                                    <datalist id="products">
                                        <?php
                                        foreach ($pro as $c) {
                                        ?>
                                            <option value="<?= $c['productID'] ?>"> <?= $p['prName'] ?> </option>

                                        <?php
                                        }
                                        ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>
                        <hr />
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <br />
                            <button type="submit" class="btn btn-primary">Gửi yêu cầu trao đổi</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-info" role="alert">
                        <div class="d-flex justify-content-center">
                            Bạn chưa mua sản phẩm nào từ SaiGonSoftware hoặc đã trao đổi hết hàng đã mua.
                        </div>
                        
                    </div>
                    <?php
                }
                ?>
                <div class="d-flex justify-content-center">
                    <a href="index.php" class="text-decoration-none">Về trang chủ</a>
                </div>
            </div>
        <?php } else {
        ?>
            <div class="container d-flex justify-content-center align-items-center flex-column">
                <h3>Nhân viên không được sử dụng chức năng này.</h3>
                <a href="index.php" class="text-decoration-none">Về trang chủ</a>
            </div>

        <?php }
        include "../footer.php"; ?>
    </body>

    </html>

<?php
} else {
    header("Location: ../login");
    exit;
}
?>