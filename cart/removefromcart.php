<?php
include "../controllers/includer.php";
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="User") {
    header("Location: ../login");
    exit;
}

// if (!isset($_GET['id'])) {
//     header("Location: ../login");
//     exit;
// }


$id = $_GET['id'];
$user = $_SESSION['username'];

removeFromCart($id,$user,$conn);

header("Location: ./index.php");
exit;

