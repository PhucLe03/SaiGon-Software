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
