<?php
// ! use in cart view


// include "../controllers/product_ctl.php";
$imageUrl = "/assets/images/products/tainghemaunho1.jpg";
$id = $_GET['productID'];
$product = getProductByID($id, $conn);
$pName = $product['prName'];
$pPrice = $product['price'];
$pQuan = $_GET['count'];
$sPrice = number_format($pPrice, 0, '', ',');
$tPrice = $pPrice * $pQuan;
$ttPrice = number_format($tPrice, 0, '', ',');
// $pPrice = number_format($price, 0, '', ',');
// echo $id;
?>
<style>
    .product-container {
        align-content: "center";
        border-bottom: 1px solid #ddd;
        display: flex;
        padding: 16px;
        width: 100%;
    }

    .product-image {
        flex: 1;
        height: 100px;
        max-width: 100px;
    }

    .details-wrap {
        padding: 0 16px;
        flex: 3;
    }

    .remove-button {
        flex: 1;
        margin: auto;
    }
</style>

<div class="product-container">
    <img class="product-image" src="<?= $imageUrl ?>" />
    <div class="details-wrap">
        <div class="row">
            <div class="col-8">
                <a href="/product/detail.php?id=<?= $product['productID'] ?>">
                    <h4><?= $pName ?></h4>
                </a>
                <h6>Đơn giá: <?= $sPrice ?> VNĐ</h6>
            </div>
            <div class="col">
                <br />
                <h6>Số lượng: <?= $pQuan ?></h6>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="d-flex flex-row-reverse">
                <h6>Tổng cộng: <?= $ttPrice ?> VNĐ</h6>
            </div>
        </div>
    </div>
</div>