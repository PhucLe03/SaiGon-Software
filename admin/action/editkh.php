<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="Admin") {
    header("Location: ../../login");
    exit;
}
if (
    isset($_POST['uname']) &&
    isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['byear']) &&
    isset($_POST['pass'])
) {
    include "../../DB_conn.php";
    include "../admin_ctl/admin.php";
    include "../../controllers/includer.php";

    $uname = $_POST['uname'];
    $ten = $_POST['fname'];
    $ho = $_POST['lname'];
    $byear = $_POST['byear'];
    $pass = $_POST['pass'];

    $_SESSION['fname'] = $ten;
    $_SESSION['lname'] = $ho;
    $_SESSION['byear'] = $byear;
    $_SESSION['pass'] = $pass;
    
    if (empty($ten) || empty($ho) || empty($pass)) {
        $em = "m"; $_SESSION['error'] = $em;
        header("Location: ../editaccount.php?id=$uname");
        exit;
    } else {
        // Sửa KH
        try {
            $sql = "UPDATE user
                    SET fname=:ten, lname=:ho, `password`=:pass, byear=:ye
                    WHERE username=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':ye', $byear);
            $stmt->bindParam(':id', $uname);
            $stmt->execute();
            
            unset($_SESSION['fname']);
            unset($_SESSION['lname']);
            unset($_SESSION['byear']);
            unset($_SESSION['pass']);
            header("Location: ../viewaccount.php?id=$uname");
            exit;
        } catch (PDOException $e) {
            $em  = "o"; $_SESSION['error'] = $em;
            $_SESSION['emess'] = $e->getMessage();
            header("Location: ../editaccount.php?id=$uname");
            exit;
        }
            
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../editaccount.php?id=$uname");
    exit;
}
