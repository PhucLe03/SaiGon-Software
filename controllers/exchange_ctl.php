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

function processExchange($user,$hh,$sp,$buyID,$cost,$conn) {
    // Update bought
    $sql = "SELECT * FROM bought
            WHERE username=? AND productID=? AND buyID=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user,$hh,$buyID]);
    $b = $stmt->fetch();
    $newcount = $b['count'] - 1;

    $sql = "UPDATE bought SET count=?
            WHERE username=? AND productID=? AND buyID=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$newcount,$user,$hh,$buyID]);
    
    $sql = "INSERT INTO bought (username,productID,count)
            VALUE (:us,:pr,'1');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':us',$user);
    $stmt->bindParam(':pr',$sp);
    $stmt->execute();

    // Get balance
    $sql = "SELECT balance FROM user
            WHERE username=:us";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':us',$user);
    $stmt->execute();
    $u = $stmt->fetch();
    $balance = $u['balance'];
    $newbalance = $balance + $cost;
    
    // Update balance
    $sql = "UPDATE user SET balance=:ba
            WHERE username=:us;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ba',$newbalance);
    $stmt->bindParam(':us',$user);
    $stmt->execute();


    // Add log
    $sql = "INSERT INTO transaction (username,productA,productB,count,type,date_time)
            VALUE (:us,:prA,:prB,'1','exchange',now());";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':us',$user);
    $stmt->bindParam(':prA',$hh);
    $stmt->bindParam(':prB',$sp);
    $stmt->execute();
}