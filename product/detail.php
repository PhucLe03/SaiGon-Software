<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "Detail";
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<?php
$product['imageUrl'] = "../assets/images/products/tainghemau.jpg";
$product['name'] = "Tai nghe";
$product['averageRating'] = 4.5;
$product['price'] = 1000000;
$product['description'] = "Tai nghe xịn";
?>
<style scoped>
#page-wrap {
    margin-top: 16px;
    padding: 16px;
    max-width: 600px;
}

#img-wrap {
    text-align: center;
}

img {
    width: 400px;
}

#product-details {
    padding: 16px;
    position: relative;
}

#add-to-cart {
    width: 100%;
}

#price {
    position: absolute;
    top: 70px;
    right: 16px;
}
</style>

<body>
    <?php include "../assets/global/global_nav.php"; ?>
    <div id="page-wrap">
    <div id="img-wrap">
        <img src="<?php echo $product['imageUrl']; ?>" />
    </div>
    <div id="product-details">
        <h1><?php echo $product['name']; ?></h1>
        <p>Average rating: <?php echo $product['averageRating']; ?></p>
        <h3 id="price"><?php echo $product['price']; ?> VNĐ</h3>
        <button id="add-to-cart">Add to Cart</button>
        <h4>Description</h4>
        <p><?php echo $product['description']; ?></p>
    </div>
</div>
</body>

</html>