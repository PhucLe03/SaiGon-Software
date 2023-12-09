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
        // $items['price'] = number_format($items['price'], 0, '', ',');
        return $items;
    } else {
        return 0;
    }
}

function getAllProduct($conn)
{
    $sql = "SELECT * FROM `products`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $items = $stmt->fetchAll();
        // $items['price'] = number_format($items['price'], 0, '', ',');
        return $items;
    } else {
        return 0;
    }
}

function getProductByCate($category, $conn)
{
    $sql = "SELECT * FROM `products`
            WHERE category = :id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $category);
    $stmt->execute();
    if ($stmt->rowCount() > 1) {
        $items = $stmt->fetchAll();
        return $items;
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

function getCategoryName($cateID, $conn)
{
    $sql = "SELECT * FROM `category`
            WHERE cID = :id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $cateID);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $item = $stmt->fetch();
        return $item['cName'];
    } else {
        return 0;
    }
}

function getImg($cate) {
    $img = "";
    switch ($cate) {
        case "HP":
            $img = "../assets/images/products/tainghemau.jpg";
            break;
        case "PC":
            $img = "../assets/images/pc.png";
            break;
        case "MP":
            $img = "../assets/images/lotchuot.jpg";
            break;
        case "LT":
            $img = "../assets/images/laptop.png";
            break;
    }
    return $img;
}
