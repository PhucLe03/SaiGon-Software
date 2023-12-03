<?php

function getCartItems($userID, $conn)
{
    $sql = "SELECT * FROM `cart`
            WHERE username = :user;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user', $userID);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $items = $stmt->fetchAll();
        return $items;
    } else {
        return 0;
    }
}
