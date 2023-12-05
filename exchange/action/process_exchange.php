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

if (!isset($_POST['hh']) || !isset($_POST['sp'])) {
    $_SESSION['error'] = "e";
    header("Location: ../index.php");
    exit;
}

$hh = $_POST['hh'];
$sp = $_POST['sp'];

if (empty($hh) || empty($sp)) {
    header("Location: ../index.php?error=3");
    exit;
}

$user = $_SESSION['username'];

$hh_split = explode(":", $hh);

$t1 = getProductByID($hh_split[0],$conn);
if ($t1 == 0) {
    header("Location: ../index.php?error=1");
    exit;
} else {
    $t11 = confirmBought($user,$hh_split[0],$hh_split[1],$conn);
    if ($t11 == false) {
        header("Location: ../index.php?error=1");
        exit;
    }
}

$t2 = getProductByID($sp,$conn);

if ($t2 == 0) {
    header("Location: ../index.php?error=2");
    exit;
}


$_SESSION['hh'] = $hh_split[0];
$_SESSION['buyID'] = $hh_split[1];
$_SESSION['sp'] = $sp;

header("Location: ../confirm.php");
exit;

