<?php
include "DB_conn.php";
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "BK ECommerce - Home";
        include "header.php";
        ?>
    </title>
    <?php include "assets/global/global_css.php" ?>
</head>

<style>
    /* Additional custom CSS styles for the slider */
    .splide {
        width: 100%;
        height: 400px;
    }

    .splide__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .caption {
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        text-align: center;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
    }
</style>

<body>
    <?php
    include "assets/global/global_nav.php";
    $slides = [
        ['imageUrl' => './assets/images/slider/1.jpg', 'ref' => '/categories/list.php?c=PC'],
        ['imageUrl' => './assets/images/slider/118_km_pc_900.png', 'ref' => '/categories/list.php?c=PC'],
        ['imageUrl' => './assets/images/slider/20230224_vIMZwzLoe8zo4oMq.jpeg', 'ref' => '/categories/list.php?c=PC'],
        ['imageUrl' => './assets/images/slider/pc_gaming_02e3e03f1a78496f9a17ddd5bbc4cdac.webp', 'ref' => '/categories/list.php?c=PC'],
        // ...
    ];
    ?>

    <div class="container">
        <div id="wrapper">
            <div><button class="active slide_button" id="prev" onclick="prev()"><i class="fa-solid fa-arrow-left"></i></button></div>
            <div id="image-container">
                <div id="image-carousel">
                    <?php
                    foreach ($slides as $slide) {
                    ?>
                        <a href="<?= $slide['ref'] ?>">
                            <img id="slide_img" src="<?= $slide['imageUrl'] ?>" alt="">
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div><button class="active slide_button" id="next" onclick="next()"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="product text-md-left">
            <div class="row text-md-left">
                <div class="col-md-1 col-lg-1 col-xl-1 mx-auto mt-3">
                    <p><img src="./assets/images/quangcao1.png" alt="Advertisement 1"></p>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-3">
                    <div class="overflow-hidden">
                        <h1 text-uppercase mb-4 font-weight-bold text-warning>PC mới</h1>
                        <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-3">
                            <div class="overflow-hidden">
                                <div class="row gy-5">
                                    <?php
                                    include "./controllers/product_ctl.php";
                                    $all = getProductByCate("PC", $conn);
                                    if ($all != 0) {
                                        foreach ($all as $sp) {
                                            $_GET['productID'] = $sp['productID'];
                                            include "product/productlistdisplay.php";
                                        }
                                    } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-lg-10 col-xl-1 mx-auto mt-3">
                    <p><img src="./assets/images/quangcao2.png" alt="Advertisement 2"></p>
                </div>
            </div>
        </div>

    </div>
    <?php include "footer.php" ?>
    <script src="./assets/js/slider.js"></script>
</body>

</html>