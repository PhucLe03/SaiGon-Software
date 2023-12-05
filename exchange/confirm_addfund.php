<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";

if (isset($_SESSION['username']) && isset($_SESSION['tucach']) && isset($_POST['amount'])) {
    if ($_SESSION['tucach'] == "User") {
        $user = $_SESSION['username'];

        $amount = $_POST['amount'];
        if ($amount < 20000 || empty($amount)) {
            $_SESSION['aerr'] = "Giao dịch không được dưới 20,000 VNĐ.";
            header("Location: addfund.php");
            exit;
        } else {
            $price = formatPrice($amount);
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>
                    <?php
                    $title = "Xác nhận và thanh toán";
                    include "../header.php";
                    ?>
                </title>
                <?php include "../assets/global/global_css.php" ?>
            </head>

            <body>
                <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
                <?php include "../assets/global/global_nav.php"; ?>
                <div class="container">
                    <h1>Xác nhận và thanh toán</h1>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-5 card">
                            <h4 class="d-flex justify-content-center">Đơn hàng của bạn</h4>

                            <hr />
                            <h5>Nạp vào tài khoản <?= $price ?> VNĐ</h5>
                            <hr />
                            <br />
                            <div class="d-flex flex-row-reverse">
                                <h4>Tổng cộng: <?= $price ?> VNĐ</h4>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-5 card">
                            <h4 class="d-flex justify-content-center">Thanh toán</h4>
                            <img src="../cart/paymethod.PNG">
                            <form method="post" action="action/process_addfund.php">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="phuc_button">Xác nhận</button>
                                </div>
                                <input name="amount" style="visibility: hidden;" value="<?= $amount ?>">
                            </form>

                        </div>
                        <div class="col"></div>
                    </div>
                </div>

                <?php include "../footer.php"; ?>
            </body>

            </html>

<?php
        }
    } else {
        header("Location: ../login/index.php");
        exit;
    }
} else {
    header("Location: ../login/index.php");
    exit;
}
?>