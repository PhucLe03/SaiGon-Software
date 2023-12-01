<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username'])) {
    $user['username'] = $_SESSION['username'];
    $user['fname'] = "Phuc";
    $user['lname'] = "Le";
    $user['byear'] = 2003;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "BKEC - Trang cá nhân";
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<body>
    <?php
    include "../assets/global/global_nav.php";
    ?>
    <div class="container mt-5">
        <h1>Trang cá nhân Quản lý</h1>
        <div class="row">
            <div class="col-4 card" style="width: 18rem;">
                <!-- <img src="../img/student-<?= $student['gender'] ?>.png" class="card-img-top" alt="..."> -->
                <img src="../assets/images/logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">@<?= $user['username'] ?></h5>
                </div>
            </div>
            <div class="col-8">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Tên: <?= $user['fname']." ".$user['lname'] ?></li>
                    <li class="list-group-item">Năm sinh: <?= $user['byear'] ?></li>
                </ul>
            </div>

        </div>
    </div>
    <?php include "../footer.php"; ?>
</body>

</html>