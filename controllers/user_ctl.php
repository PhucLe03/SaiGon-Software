<?php

function getCusInfo($userid, $conn)
{
    $sql = "SELECT * FROM user WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userid]);
    if ($stmt->rowCount() == 1) {
        $u = $stmt->fetch();
        return $u;
    } else {
        return 0;
    }
}

function getAllUser($conn) {
    $sql = "SELECT * FROM user;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $u = $stmt->fetchAll();
        return $u;
    } else {
        return 0;
    }
}

function countUserTransacs($user,$conn) {
    $sql = "SELECT * FROM `transaction`
            WHERE username=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user]);
    return $stmt->rowCount();
}

function getAdminInfo($userid, $conn)
{
    $sql = "SELECT * FROM admin WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userid]);
    if ($stmt->rowCount() == 1) {
        $u = $stmt->fetch();
        return $u;
    } else {
        return 0;
    }
}
