<?php

function getAllSP($conn) {
    $sql = "SELECT * FROM in4products ORDER BY category;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()>0) {
        $sp = $stmt->fetchAll();
        return $sp;
    } else {
        return 0;
    }
}

function checkBuying($productID,$conn) {
    $sql = "SELECT * FROM cart 
            WHERE product=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$productID]);
    if ($stmt->rowCount()>0) {
        return true;
    } else {
        return false;
    }
}