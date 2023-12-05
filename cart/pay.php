<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";

if (isset($_SESSION['username']) && isset($_SESSION['tucach'])) {
    if ($_SESSION['tucach'] == "User") {
        $user = $_SESSION['username'];

        $cart = $_GET['cartID'];
        $item = getCartItemByID($cart,$conn);
        if ($item==0) {
            header("Location: ./index.php"); exit;
        }
        if ($item['username']==$user) {
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
                <?php
                if ($item!=0) {
                    $_GET['count'] = $item['count'];
                    $_GET['productID'] = $item['product'];
                    $prod = getProductByID($item['product'],$conn);
                    $ttPrice = $prod['price'] * $item['count'];
                ?>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-5 card">
                        <h4 class="d-flex justify-content-center">Đơn hàng của bạn</h4>
                        <?php include "../product/productlistpay.php"; ?>
                        <br/>
                        <div class="d-flex flex-row-reverse">
                            <h4>Tổng cộng: <?= $ttPrice ?> VNĐ</h4>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col-5 card">
                        <h4 class="d-flex justify-content-center">Thanh toán</h4>
                        <img src="./paymethod.PNG">
                        <form method="post" action="action/payone.php">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="phuc_button">Xác nhận</button>
                            </div>
                            <input name="cart" style="visibility: hidden;" value="<?=$cart?>">
                        </form>
                        
                    </div>
                    <div class="col"></div>
                </div>


                <?php
                }
                // unset($_SESSION['cartID']);
                ?>
            </div>

            <?php include "../footer.php"; ?>
        </body>

        </html>

<?php
} else {
    header("Location: ../login/index.php");
    exit;
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