<?php

function getProductByID($productID, $conn)
{
    $sql = "SELECT * FROM `products`
            WHERE productID = :id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $productID);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $items = $stmt->fetch();
        $items['price'] = number_format($items['price'], 0, '', ',');
        return $items;
    } else {
        return 0;
    }
}
