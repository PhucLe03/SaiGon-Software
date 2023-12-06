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
    $pass = $_POST['pass'];
    $byear = $_POST['byear'];
    
    $_SESSION['uname'] = $uname;
    $_SESSION['fname'] = $ten;
    $_SESSION['lname'] = $ho;
    $_SESSION['pass'] = $pass;
    $_SESSION['byear'] = $byear;
    
    $check = getCusInfo($uname,$conn);
    if ($check!=0) {
        $em = "a"; $_SESSION['error'] = $em;
        header("Location: ../account.php");
        exit;
    }

    if (empty($uname) || empty($ten) || 
        empty($ho) || empty($pass) || empty($byear)) {
        $em = "m"; $_SESSION['error'] = $em;
        header("Location: ../account.php");
        exit;
    } else {
        // Thêm KH
        try {
            $sql = "INSERT INTO user (username,fname,lname,`password`,byear,balance)
                    VALUE (:id,:na,:me,:pa,:ye,'0');";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $uname);
            $stmt->bindParam(':na', $ten);
            $stmt->bindParam(':me', $ho);
            $stmt->bindParam(':pa', $pass);
            $stmt->bindParam(':ye', $byear);
            $stmt->execute();

            unset($_SESSION['fname']);
            unset($_SESSION['lname']);
            unset($_SESSION['byear']);
            unset($_SESSION['pass']);
            header("Location: ../account.php");
            exit;
        } catch (PDOException $e) {
            $em  = "o"; $_SESSION['error'] = $em;
            $_SESSION['emess'] = $e->getMessage();
            header("Location: ../account.php");
            exit;
        }
            
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../account.php");
    exit;
}
