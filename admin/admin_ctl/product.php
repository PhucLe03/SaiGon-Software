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

function getAllCategory($conn) {
    $sql = "SELECT * FROM category;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()>0) {
        $sp = $stmt->fetchAll();
        return $sp;
    } else {
        return 0;
    }
}