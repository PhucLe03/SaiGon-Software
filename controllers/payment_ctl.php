<?php

function payProduct($cartID,$conn) {
    // get info
    $cart = getCartItemByID($cartID,$conn);
    $product = getProductByID($cart['product'],$conn);
    $price = $product['price'];
    $totalpayment = $price * $cart['count'];

    // add to bought
    $sql = "INSERT INTO bought (username,productID,count)
            VALUE (:us,:pr,:co);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':us',$cart['username']);
    $stmt->bindParam(':pr',$cart['product']);
    $stmt->bindParam(':co',$cart['count']);
    $stmt->execute();

    // delete from cart
    $sql = "DELETE FROM cart
            WHERE cartID=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$cart['cartID']);
    $stmt->execute();

    // Get balance
    $sql = "SELECT balance FROM user
            WHERE username=:us";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':us',$cart['username']);
    $stmt->execute();
    $u = $stmt->fetch();
    $balance = $u['balance'];

    // Decrease balance
    
    $newbalance = $balance - $totalpayment;
    if ($newbalance<0) {
        $newbalance = 0;
    }

    $sql = "UPDATE user SET balance=:ba
            WHERE username=:us";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ba',$newbalance);
    $stmt->bindParam(':us',$cart['username']);
    $stmt->execute();
}