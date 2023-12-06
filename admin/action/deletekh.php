<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="Admin") {
    header("Location: ../../login");
    exit;
}
if (isset($_POST['deleteUser'])) {
    include "../../DB_conn.php";
    include "../admin_ctl/admin.php";
    include "../../controllers/includer.php";

    $username = $_POST['deleteUser'];

    $check = checkBalance($username,$conn);
    if ($check==true) {
        $_SESSION['emess'] = "Không thể xóa tài khoản này";
        header("Location: ../deleteaccount.php?id=$username");
        exit;
    }
        // Delete SP
    try {
        $sql = "DELETE FROM user
                WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        header("Location: ../account.php");
        exit;
    } catch (PDOException $e) {
        // $_SESSION['emess'] = $e->getMessage();
        $_SESSION['emess'] = "Đã xảy ra lỗi không mong muốn";
        header("Location: ../deleteaccount.php?id=$username");
        exit;
    }
} else {
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../deleteaccount.php?id=$username");
    exit;
}
