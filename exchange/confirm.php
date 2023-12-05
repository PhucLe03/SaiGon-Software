<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";
include "../controllers/exchange_ctl.php";

if (isset($_SESSION['username']) && isset($_SESSION['tucach'])
    && isset($_SESSION['sp']) && isset($_SESSION['hh'])) {
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

            $sp = $_SESSION['sp']; $hh = $_SESSION['hh'];
            $sanpham = getProductByID($_SESSION['sp'],$conn);
            $hanghoa = getProductByID($_SESSION['hh'],$conn);
            $priceSP = $sanpham['price'];
            $priceHH = evaluate($hanghoa['price']);
            $balance_change = $priceHH - $priceSP;
        ?>
            <div class="container">
                <h1>Xác nhận trao đổi</h1>
                <div class="d-flex justify-content-center">
                    <h4>Số dư tài khoản: <?= $balance ?> VNĐ </h4>
                </div>
                    <form method="post" action="../exchange/action/confirm_exchange.php">
                        <hr /> <br />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" list="bought" class="form-control" name="hh" placeholder=""
                                    value="<?=$_SESSION['hh'].':'.$_SESSION['buyID']?>" disabled>
                                    <label class="form-label">Mã hàng bạn đã chọn <span style="color: red;">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" list="products" class="form-control" name="sp" placeholder=""
                                    value="<?=$_SESSION['sp']?>" disabled>
                                    <label class="form-label">Mã sản phẩm muốn trao đổi <span style="color: red;">*</span></label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 container-fluid">
                                <div class="card">
                                    <?php $_GET['productID'] = $hh; $_GET['type'] = "hh";
                                    include "../product/productlistex.php"; ?>
                                </div>
                            </div>
                            <div class="col-md-6 container-fluid">
                                <div class="card">
                                    <?php $_GET['productID'] = $sp; $_GET['type'] = "sp";
                                    include "../product/productlistex.php"; ?>
                                </div>
                            </div>

                        </div>
                        <hr />
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <br />
                            <!-- Confirmation message here -->
                            <div class="d-flex justify-content-center card">
                                <?php
                                if ($balance_change<0) {
                                    $giatien = formatPrice(-$balance_change);
                                ?>
                                <div class="">
                                    <h5>Bạn cần phải trả thêm <?=$giatien?> VNĐ để hoàn tất việc trao đổi</h5>
                                </div>
                                <?php
                                } else {
                                    $giatien = formatPrice($balance_change);
                                    ?>
                                <h5>Cửa hàng sẽ hoàn lại <?=$giatien?> VNĐ vào số dư của Quý Khách hàng sau khi hoàn tất trao đổi</h5>
                                <?php
                                }
                                ?>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Xác nhận yêu cầu trao đổi</button>
                        </div>
                        <input name="buyID" value="" style="visibility: hidden;">
                        <input name="hanghoa" value="" style="visibility: hidden;">
                        <input name="sanpham" value="" style="visibility: hidden;">
                        <input name="nguoidung" value="" style="visibility: hidden;">
                    </form>
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