<?php

function getAllBuy($conn) {
    $sql = "SELECT * FROM `transaction` WHERE `type`='buy';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $buy = $stmt->fetchAll();
        return $buy;
    } else {
        return 0;
    }
}

function getAllExchange($conn) {
    $sql = "SELECT * FROM `transaction` WHERE `type`='exchange';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $buy = $stmt->fetchAll();
        return $buy;
    } else {
        return 0;
    }
}