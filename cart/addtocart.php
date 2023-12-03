<?php
include "../controllers/includer.php";
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="User") {
    header("Location: ../login");
    exit;
}

if (!isset($_POST['id']) && !isset($_POST['sl'])) {
    header("Location: ../login");
    exit;
}


$id = $_POST['id'];
$quan = $_POST['sl'];
$user = $_SESSION['username'];

if (checkCart($id,$user,$conn)!=true) {
    addtoCart($id,$user,$quan,$conn);
}
header("Location: ./index.php");
exit;

