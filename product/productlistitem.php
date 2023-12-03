<?php
// ! use in cart view


// include "../controllers/product_ctl.php";
$imageUrl = "/assets/images/products/tainghemaunho1.jpg";
$id = $_GET['productID'];
$product = getProductByID($id,$conn);
$pName = $product['prName'];
$pPrice = $product['price'];
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
        <h3><?= $pName ?></h3>
        <p><?= $pPrice ?> VNĐ</p>
    </div>
    <button class="remove-button">Remove From Cart</button>
</div>