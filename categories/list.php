<?php
include "../DB_conn.php";
include "../controllers/includer.php";
if (!isset($_GET['c'])) {
    header("Location: ../index.php");
    exit;
}
$cate = $_GET['c'];
$name = getCategoryName($cate,$conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "BKEC - ".$name;
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
                <h1 text-uppercase mb-4 font-weight-bold text-warning><?=$name?> mới</h1>
                <div class="row gy-5">
                    <?php
                    $all = getProductByCate($cate,$conn);
                    if ($all!=0) {
                        foreach ($all as $sp) {
                            $_GET['productID'] = $sp['productID'];
                            include "../product/productlistdisplay.php";
                        }
                    } else {
                    ?>
                    <div class="container">
                        <h4>Chưa có sản phẩm loại này</h4>
                    </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>

        <br /><br />
        <div class="container"></div>

    </div>
    <?php include "../footer.php";?>

</body>

</html>