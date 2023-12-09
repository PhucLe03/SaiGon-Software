<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";

if (isset($_SESSION['username']) && isset($_SESSION['tucach'])) {
    if ($_SESSION['tucach'] == "User") {
        $user = $_SESSION['username'];
        $items = getCartItems($user, $conn);
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                $title = "Giỏ hàng";
                include "../header.php";
                ?>
            </title>
            <?php include "../assets/global/global_css.php" ?>
        </head>

        <body>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
            <?php include "../assets/global/global_nav.php"; ?>
            <div class="container">
                <h1>Giỏ hàng</h1>
                <?php
                if ($items != 0) {
                    $total = calcPrice($items, $conn);
                ?>

                    <div class="d-flex flex-row-reverse">
                        <h4>Tổng tiền tạm tính: <?= $total ?> VNĐ</h4>
                    </div>
                    <?php

                    foreach ($items as $item) {
                        $_GET['productID'] = $item['product'];
                        $_GET['count'] = $item['count'];
                        $_GET['cartID'] = $item['cartID'];
                        include "../product/productlistitem.php";
                    }
                    ?>

                <div class="d-flex flex-row-reverse">
                    <a href="/cart/bkpay.php" class="phuc_button">Thanh toán tất cả</a>
                </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-info .w-450" role="alert">
                        Giỏ hàng còn trống!
                    </div>
                    <a href="/index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                <?php
                }
                ?>
            </div>
            <?php include "../footer.php"; ?>
        </body>

        </html>

<?php
    } else {
        header("Location: login/index.php");
        exit;
    }
} else {
    header("Location: login/index.php");
    exit;
}
?>