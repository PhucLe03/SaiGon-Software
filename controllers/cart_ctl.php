<?php

// include "product_ctl.php";

function calcPrice($items,$conn) {
    $ans = 0;
    foreach($items as $item) {
        $prod = getProductByID($item['product'],$conn);
        $ans = $ans + $prod['price'] * $item['count'];
    }
    return formatPrice($ans);
}

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

function getCartItemByID($cartID, $conn)
{
    $sql = "SELECT * FROM `cart`
            WHERE cartID = :id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $cartID);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $item = $stmt->fetch();
        return $item;
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

function change_amount($prod,$user,$newQuan,$conn) {
    $sql = "UPDATE cart SET count=:ne
            WHERE product=:pr AND username=:us;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ne', $newQuan);
    $stmt->bindParam(':pr', $prod);
    $stmt->bindParam(':us', $user);
    $stmt->execute();
}
