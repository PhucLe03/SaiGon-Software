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
    <?php include "../assets/global/global_css.php"?>
</head>

<body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <?php include "../assets/global/global_nav.php";?>
    <div class=" container">
        <h1>Cart View</h1>
        <!-- <div class="slider"></div> -->
        <?php
        for ($x = 1; $x < 5; $x++) {
            $_GET['id'] = $x;
            include "../product/productlistitem.php";
        }
        ?>
    </div>
</body>

</html>