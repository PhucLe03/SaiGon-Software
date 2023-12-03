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

function checkCart($prod,$user,$conn) {
    $sql = "SELECT * FROM cart
            WHERE product=:pr AND username=:us;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pr', $prod);
    $stmt->bindParam(':us', $user);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

function addtoCart($prod,$user,$quan,$conn) {
    $sql = "INSERT INTO cart (product,username,count)
            VALUE (:pr,:us,:qu);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pr', $prod);
    $stmt->bindParam(':us', $user);
    $stmt->bindParam(':qu', $quan);
    $stmt->execute();
}

function removeFromCart($prod,$user,$conn) {
    $sql = "DELETE FROM cart
            WHERE product=:pr AND username=:us;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pr', $prod);
    $stmt->bindParam(':us', $user);
    $stmt->execute();
}

