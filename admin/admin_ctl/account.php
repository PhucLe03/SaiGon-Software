<?php

function checkBalance($user,$conn) {
    $sql = "SELECT balance FROM user
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user]);
    $u = $stmt->fetch();
    $bal = $u['balance'];
    if ($bal > 0) {
        return true;
    } else {
        return false;
    }
}