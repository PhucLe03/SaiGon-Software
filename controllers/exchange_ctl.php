<?php

function getBoughtProd($username,$conn) {
    $sql = "SELECT * FROM bought
            WHERE username=? AND count>0";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    if ($stmt->rowCount() >= 1) {
        $items = $stmt->fetchAll();
        return $items;
    } else {
        return 0;
    }
}

function getAllProducts($conn) {
    $sql = "SELECT * FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $items = $stmt->fetchAll();
        return $items;
    } else {
        return 0;
    }
}