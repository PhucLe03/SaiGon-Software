<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";
if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
} else {
    $id = $_GET['id'];
    $product = getProductByID($id, $conn);
    if ($product == 0) {
        header("Location: ../index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = $product['prName'];
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<?php
$product['imageUrl'] = "../assets/images/products/tainghemau.jpg";
$product['fPrice'] = formatPrice($product['price']);
// $product['name'] = "Tai nghe";
$product['averageRating'] = 4.5;
// include "../controllers/product_ctl.php";
$product['imageUrl'] = getImg($product['category']);

// $product['price'] = 1000000;
// $product['description'] = "Tai nghe xịn";
?>
<!-- <style scoped>
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

    #price1 {
        position: absolute;
        top: 70px;
        right: 16px;
    }

    .product-layout .product-info {
        position: relative;
    }
</style> -->

<body>
    <?php include "../assets/global/global_nav.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo $product['imageUrl']; ?>" />
            </div>
            <div class="col-md-6">
                <h1><?php echo $product['prName']; ?></h1>
                <p>Đánh giá trung bình: <?php echo $product['averageRating']; ?></p>
                <h3 id="price"><?php echo $product['fPrice']; ?> VNĐ</h3>

                <?php
                if (isset($_SESSION['username']) && $_SESSION['tucach'] == "User") {
                    $user = $_SESSION['username'];
                    $check = checkCart($id,$user,$conn);
                    if ($check!=true) {
                ?>

                    <form id="addtocart" method="post" action="../cart/addtocart.php?">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" min="1" class="form-control" name="sl" placeholder="" value="1">
                                    <label class="form-label">Số lượng <span style="color: red;">*</span></label>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary" style="height: 60px;">Thêm vào giỏ hàng</button>
                            </div>
                            <input type="text" name="id" placeholder="" value="<?=$id?>" style="visibility: hidden;">
                        </div>
                        
                    </form>
                    <?php
                    } else {
                        ?> <a class="btn btn-primary" href="/cart">Đi đến giỏ hàng</a> <?php
                    }
                    ?>

                <?php
                }
                ?>
                <hr/>
                <p>Xuất xứ: <?=$product['origin']?></p>
                <h4>Mô tả</h4>
                <p><?php echo $product['desc']; ?></p>
            </div>

        </div>
    </div>
    <!-- <div id="d-flex flex-wrap">
        <div id="img-wrap col-lg-5 col-md-12 col-12">
            <img src="<?php echo $product['imageUrl']; ?>" />
        </div>
        <div id="col-lg-5 col-md-12 col-12 product-info">
            <h1><?php echo $product['name']; ?></h1>
            <p>Average rating: <?php echo $product['averageRating']; ?></p>
            <h3 id="price"><?php echo $product['price']; ?> VNĐ</h3>
            <button id="add-to-cart">Add to Cart</button>
            <h4>Description</h4>
            <p><?php echo $product['description']; ?></p>
        </div>
    </div> -->
    <?php include "../footer.php"; ?>
</body>

</html>
