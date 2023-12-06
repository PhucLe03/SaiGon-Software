<?php
$productID = $_GET['productID'];
$product = getProductByID($productID, $conn);
$product['imageUrl'] = getImg($product['category']);
$price = formatPrice($product['price']);
$category = getCategoryName($product['category'], $conn);

?>

<a href="/product/detail.php?id=<?= $productID ?>" class="col-6 p-3">
    <div>
        <div class="row">
            <div class="col-md-4 ">
                <img src="<?= $product['imageUrl'] ?>" alt="this is img" height="150" width="150">
            </div>
            <div class="col-md-4">
                <div class="newProduct">
                    Sản phẩm mới
                </div>
                <div class="nameOfProduct">
                    <?= $product['prName'] ?>
                </div>
                <div class="accessoryOfProduct">
                    <?= $category ?>
                </div>
                <div class="priceOfProduct">
                    <?= $price ?> VNĐ
                </div>
            </div>
        </div>
    </div>

</a>