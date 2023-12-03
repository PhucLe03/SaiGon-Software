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
                $title = "Cart";
                include "../header.php";
                ?>
            </title>
            <?php include "../assets/global/global_css.php" ?>
        </head>

        <body>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
            <?php include "../assets/global/global_nav.php"; ?>
            <div class=" container">
                <h1>Cart View</h1>
                <!-- <div class="slider"></div> -->
                <?php
                if ($items != 0) {

                    foreach ($items as $item) {
                        $_GET['productID'] = $item['product'];
                        include "../product/productlistitem.php";
                    }
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