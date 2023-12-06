<?php

// include "../../DB_conn.php";
include "account.php";
include "product.php";
include "transaction.php";

function getAllAdmin($conn) {
    $sql = "SELECT * FROM `admin`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $ad = $stmt->fetchAll();
        return $ad;
    } else {
        return 0;
    }
}