<?php
// ! use in cart view


// include "../controllers/product_ctl.php";
$imageUrl = "/assets/images/products/tainghemaunho1.jpg";
$id = $_GET['productID'];
$product = getProductByID($id, $conn);
$pName = $product['prName'];
$pPrice = $product['price'];
$pQuan = $_GET['count'];
$cart = $_GET['cartID'];
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
    <div class="col-1">
        <br />
        <!-- <a href="../cart/removefromcart.php?id=<?= $id ?>">
                    <button class="remove-button">Xóa khỏi giỏ hàng</button>
                </a> -->
        <form method="post" action="../cart/removefromcart.php?id=<?= $id ?>">
            <button type="submit" class="remove-button">
                <span class="material-symbols-outlined">
                    delete_forever
                </span>
            </button>
        </form>
    </div>
    <img class="product-image" src="<?= $imageUrl ?>" />
    <div class="details-wrap">
        <div class="row">
            <div class="col">
                <a href="/product/detail.php?id=<?= $product['productID'] ?>">
                    <h2><?= $pName ?></h2>
                </a>
                <h6>Đơn giá: <?= $sPrice ?> VNĐ</h6>
            </div>
            <div class="col">
                <br />
                <h6>Số lượng: <?= $pQuan ?></h6>
                <h6>Giá: <?= $ttPrice ?> VNĐ</h6>
            </div>
            <div class="col">
                <form method="post" action="../cart/change_amount.php?id=<?= $id ?>">
                    <div class="form-floating mb-3 col-5">
                        <input type="number" min="1" class="form-control" name="sl" placeholder="" value="<?= $pQuan ?>">
                        <label class="form-label">Số lượng <span style="color: red;">*</span></label>
                    </div>
                    <button type="submit" class="btn btn-primary">Đổi số lượng</button>
                </form>
            </div>
            <div class="col">
                <br />
                <!-- <form method="post" action="../cart/pay.php"> -->
                <form method="post" action="../cart/pay.php?cartID=<?= $cart ?>">
                    <?php 
                    ?>
                    <button type="submit" class="btn phuc_button">Thanh toán</button>
                </form>
            </div>

        </div>
    </div>
</div>