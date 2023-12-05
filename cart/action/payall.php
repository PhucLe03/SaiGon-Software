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

$user = $_SESSION['username'];

$sql = "SELECT * FROM cart WHERE username=?;";
$stmt = $conn->prepare($sql);
$stmt->execute([$user]);
if ($stmt->rowCount() < 1) {
    header("Location: ../index.php");
    exit;
}

$cart_items = $stmt->fetchAll();
foreach($cart_items as $item) {
    $id = $item['cartID'];
    if (checkCart($id,$user,$conn)!=true) {
        payProduct($id,$conn);
    }
}

header("Location: ../index.php");
exit;

