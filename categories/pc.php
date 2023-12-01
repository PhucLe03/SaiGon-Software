<?php
$product = "NEW PC";
$accessory = "PC";
$price = 2000000;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "BKEC - PC";
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<body>
    <?php
    include "../assets/global/global_nav.php";
    ?>
    <div class="container-fluid">
        <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-3">
            <div class="overflow-hidden">
                <h1 text-uppercase mb-4 font-weight-bold text-warning>PC bán chạy</h1>
                <div class="row gy-5">
                    <!-- product 1 -->
                    <div class="col-6 p-3 ">
                        <div class="row">
                            <div class="col-md-4 ">
                                <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
                            </div>
                            <div class="col-md-4">
                                <div class="newProduct">
                                    Sản phẩm mới
                                </div>
                                <div class="nameOfProduct">
                                    <?= $product ?>
                                </div>
                                <div class="accessoryOfProduct">
                                    <?= $accessory ?>
                                </div>
                                <div class="priceOfProduct">
                                    <?= $price ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product 2 -->
                    <div class="col-6 p-3 ">
                        <div class="row">
                            <div class="col-md-4 ">
                                <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
                            </div>
                            <div class="col-md-4">
                                <div class="newProduct">
                                    Sản phẩm mới
                                </div>
                                <div class="nameOfProduct">
                                    <?= $product ?>
                                </div>
                                <div class="accessoryOfProduct">
                                    <?= $accessory ?>
                                </div>
                                <div class="priceOfProduct">
                                    <?= $price ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product 3 -->
                    <a class="col-6 p-3" href="/product/detail.php">
                        <div>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
                                </div>
                                <div class="col-md-4">
                                    <div class="newProduct">
                                        Sản phẩm mới
                                    </div>
                                    <div class="nameOfProduct">
                                        <?= $product ?>
                                    </div>
                                    <div class="accessoryOfProduct">
                                        <?= $accessory ?>
                                    </div>
                                    <div class="priceOfProduct">
                                        <?= $price ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-6 p-3" href="/product/detail.php">
                        <div>
                            <div class="row">
                                <div class="col-md-4 ">
                                    <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
                                </div>
                                <div class="col-md-4">
                                    <div class="newProduct">
                                        Sản phẩm mới
                                    </div>
                                    <div class="nameOfProduct">
                                        <?= $product ?>
                                    </div>
                                    <div class="accessoryOfProduct">
                                        <?= $accessory ?>
                                    </div>
                                    <div class="priceOfProduct">
                                        <?= $price ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <br /><br />
        <div class="container"></div>

    </div>
    <?php include "../footer.php";?>

</body>

</html>