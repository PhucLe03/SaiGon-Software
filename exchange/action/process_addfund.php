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

$amount = $_POST['amount'];
$user = $_SESSION['username'];

processAddFund($user,$amount,$conn);

header("Location: ../index.php");
exit;

