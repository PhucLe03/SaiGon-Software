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
            $title = "Nạp tiền";
            include "../header.php";
            ?>
        </title>
        <?php include "../assets/global/global_css.php" ?>
    </head>

    <body>
        <?php include "../assets/global/global_nav.php";
        if ($_SESSION['tucach'] == "User") {
            // TODO: get User's account balance
            $user = $_SESSION['username'];
            $info = getCusInfo($user, $conn);
            $real_balance = $info['balance'];
            $balance = formatPrice($real_balance);
        ?>
            <div class="container">
                <h1>Nạp tiền</h1>
                <div class="d-flex justify-content-center">
                    <h4>Số dư tài khoản: <?= $balance ?> VNĐ </h4>
                </div>
                <!-- <br/> -->
                <div class="container-fluid d-flex justify-content-center">
                <?php
                        // $err_stmt = $_GET['error'];
                        if (isset($_SESSION['aerr'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                $err = $_SESSION['aerr'];
                                unset($_SESSION['aerr']);
                                echo $err;
                            }
                            ?>
                            </div>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <form method="post" action="confirm_addfund.php">
                        <div class="row">
                            <div class="col-7">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="amount" placeholder="" value="<?php
                                        if (isset($_SESSION['amount'])) {
                                            echo $_SESSION['amount']; unset($_SESSION['amount']);
                                        }
                                        ?>">
                                        <label class="form-label">Nhập số tiền muốn nạp <span style="color: red;">*</span></label>
                                    </div>
                            </div>
                            <div class="col-5">
                                    <button type="submit" class="phuc_button">Thanh toán</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <h4>Hoặc chọn số tiền cố định:</h4>
                </div>
                <?php
                $custom = [20000,100000,500000,1000000,10000000,50000000];
                foreach ($custom as $money) {
                    $display = formatPrice($money)." VNĐ";
                ?>
                <div class="container-fluid d-flex justify-content-center">
                    <form method="post" action="confirm_addfund.php">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-4">
                                    <div class="">
                                        <div class="">
                                        <input class="form-control" type="text" placeholder="" value="<?=$display?>" disabled>
                                        </div>
                                        <!-- <input type="text" class="form-control" name="amount" placeholder="" value="<?=$display?>" disabled> -->
                                        <!-- <label class="form-label"></label> -->
                                    </div>
                            </div>
                            <div class="col-5">
                                    <button type="submit" class="btn btn-primary">Chọn</button>
                            </div>
                            <input name="amount"value="<?=$money?>" style="visibility: hidden;">
                        </div>
                    </form>
                </div>
                <?php } ?>
                
                <div class="d-flex justify-content-center">
                    <a href="index.php" class="text-decoration-none">Về trang trao đổi</a>
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