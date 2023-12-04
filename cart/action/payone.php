<?php
include "../../DB_conn.php";
include "../../controllers/includer.php";
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="User") {
    header("Location: ../login");
    exit;
}

if (!isset($_POST['cart'])) {
    header("Location: ../login");
    exit;
}


$id = $_POST['cart'];
$user = $_SESSION['username'];

if (checkCart($id,$user,$conn)!=true) {
    payProduct($id,$conn);
}
header("Location: ../index.php");
exit;

