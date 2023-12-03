<?php
if (!isset($_SESSION)) {
    session_start();
}

if (
    isset($_POST['uname']) &&
    isset($_POST['pass'])
) {
    // include "../assets/global/global_includer.php";
    include "../DB_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $_SESSION['uname'] = $uname;
    $_SESSION['pass'] = $pass;

    $miss_uname = false;
    $miss_pass = false;

    if (empty($uname)) {
        $miss_uname = true;
    }
    if (empty($pass)) {
        $miss_pass = true;
    }

    if ($miss_uname == true && $miss_pass == true) {
        $em  = "unp";
        header("Location: index.php?error=$em");
        exit;
    } else if ($miss_uname == true) {
        $em  = "u";
        header("Location: index.php?error=$em");
        exit;
    } else if ($miss_pass == true) {
        $em  = "p";
        header("Location: index.php?error=$em");
        exit;
    } else {
        // Đăng nhập
        unset($_SESSION['uname']);
        unset($_SESSION['pass']);
        $sql = "SELECT * FROM user
                WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username = $user['username'];
            $password = $user['password'];
            if ($username === $uname) {
                if ($pass === $password) {
                    $_SESSION['tucach'] = "User";
                    $id = $user['username'];
                    $_SESSION['username'] = $id;
                    header("Location: ../index.php");
                    exit;
                } else {
                    $em  = "w";
                    header("Location: index.php?error=$em");
                    exit;
                }
            } else {
                $em  = "o";
                header("Location: index.php?error=$em");
                exit;
            }
        } else {
            $sql = "SELECT * FROM admin
                WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$uname]);
            $user = $stmt->fetch();
            $username = $user['username'];
            $password = $user['password'];
            if ($username === $uname) {
                if ($pass === $password) {
                    $_SESSION['tucach'] = "Admin";
                    $id = $user['username'];
                    $_SESSION['username'] = $id;
                    header("Location: ../index.php");
                    exit;
                } else {
                    $em  = "w";
                    header("Location: index.php?error=$em");
                    exit;
                }
            } else {
                $em  = "w";
                header("Location: index.php?error=$em");
                exit;
            }
        }
    }
} else {
    $em  = "o";
    header("Location: index.php?error=$em");
    exit;
}
