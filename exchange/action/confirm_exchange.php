<?php
include "../../DB_conn.php";
include "../../controllers/includer.php";
include "../../controllers/exchange_ctl.php";
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="User") {
    header("Location: ../../login");
    exit;
}

$hanghoa = $_POST['hanghoa'];
$sanpham = $_POST['sanpham'];
$cost = $_POST['giatien'];
$buyID = $_POST['buyID'];

$user = $_SESSION['username'];

unset($_SESSION['hh']);
unset($_SESSION['sp']);
unset($_SESSION['buyID']);

processExchange($user,$hanghoa,$sanpham,$buyID,$cost,$conn);
$_SESSION['exsuccess'] = "Trao đổi thành công, kính mời Quý Khách mang hàng đến cửa hàng để trao đổi.";
header("Location: ../index.php");
exit;

