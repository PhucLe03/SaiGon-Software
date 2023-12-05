<?php

function evaluate($price) { // Trong tương lai sẽ tính thêm hao mòn theo thời gian
    return $price * (1 - 0.05);
}

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

function confirmBought($username,$product,$id,$conn) {
    $sql = "SELECT * FROM bought
            WHERE username=? AND productID=? AND buyID=? AND count>0";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username,$product,$id]);
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
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

