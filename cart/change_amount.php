<?php
include "../controllers/includer.php";
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="User") {
    header("Location: ../login");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: ../login");
    exit;
}


$id = $_GET['id'];
$qu = $_POST['sl'];
$user = $_SESSION['username'];

change_amount($id,$user,$qu,$conn);

header("Location: ./index.php");
exit;

