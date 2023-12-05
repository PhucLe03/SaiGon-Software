<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="Admin") {
    header("Location: ../../login");
    exit;
}
if (isset($_POST['deleteID'])) {
    include "../../DB_conn.php";
    include "../admin_ctl/admin.php";
    include "../../controllers/includer.php";

    $mssp = $_POST['deleteID'];

    $check = checkBuying($mssp,$conn);
    if ($check==true) {
        $em = "o"; $_SESSION['error'] = $em;
        header("Location: ../deleteproduct.php?id=$mssp");
        exit;
    }
        // Delete SP
    try {
        $sql = "DELETE FROM products
                WHERE productID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$mssp]);
        header("Location: ../product.php?id=$mssp");
        exit;
    } catch (PDOException $e) {
        $em  = "o"; $_SESSION['error'] = $em;
        $_SESSION['emess'] = $e->getMessage();
        header("Location: ../deleteproduct.php?id=$mssp");
        exit;
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../deleteproduct.php?id=$mssp");
    exit;
}
