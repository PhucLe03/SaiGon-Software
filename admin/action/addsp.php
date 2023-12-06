<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['tucach']!="Admin") {
    header("Location: ../../login");
    exit;
}
if (
    isset($_POST['mssp']) &&
    isset($_POST['ten']) &&
    isset($_POST['cost']) &&
    isset($_POST['cate']) &&
    isset($_POST['origin']) &&
    isset($_POST['noidung'])
) {
    include "../../DB_conn.php";
    include "../admin_ctl/admin.php";
    include "../../controllers/includer.php";

    $mssp = $_POST['mssp'];
    
    $cate = $_POST['cate'];
    
    $ten = $_POST['ten'];
    $cost = $_POST['cost'];
    $origin = $_POST['origin'];
    $noidung = $_POST['noidung'];

    $_SESSION['mssp'] = $mssp;
    $_SESSION['ten'] = $ten;
    $_SESSION['cost'] = $cost;
    $_SESSION['cate'] = $cate;
    $_SESSION['origin'] = $origin;
    $_SESSION['noidung'] = $noidung;

    $check = getProductByID($mssp,$conn);
    if ($check!=0) {
        $em = "a"; $_SESSION['error'] = $em;
        header("Location: ../product.php");
        exit;
    }

    $flag = false;
    $allcates = getAllCategory($conn);
    foreach ($allcates as $c) {
        if ($c['cID']==$cate) {
            $flag = true; break;
        }
    }
    
    if (empty($mssp) || empty($ten) || empty($cate) || 
        empty($origin) || empty($noidung)) {
        $em = "m"; $_SESSION['error'] = $em;
        header("Location: ../product.php");
        exit;
    } else {
        if ($flag!=true) {
            $em  = "o"; $_SESSION['error'] = $em;
            $_SESSION['emess'] = "Danh mục không hợp lệ";
            header("Location: ../product.php?id=$mssp");
            exit;
        }
        // Thêm SP
        try {
            $type = "Medium";
            $sql = "INSERT INTO products (productID,prName,price,category,`type`,origin,`desc`)
                    VALUE (:id,:na,:pr,:ca,:ty,:ori,:de);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $mssp);
            $stmt->bindParam(':na', $ten);
            $stmt->bindParam(':pr', $cost);
            $stmt->bindParam(':ca', $cate);
            $stmt->bindParam(':ty', $type);
            $stmt->bindParam(':ori', $origin);
            $stmt->bindParam(':de', $noidung);
            $stmt->execute();

            unset($_SESSION['mssp']); 
            unset($_SESSION['ten']);
            unset($_SESSION['cost']);
            unset($_SESSION['cate']);
            unset($_SESSION['origin']);
            unset($_SESSION['noidung']);
            header("Location: ../product.php");
            exit;
        } catch (PDOException $e) {
            $em  = "o"; $_SESSION['error'] = $em;
            $_SESSION['emess'] = $e->getMessage();
            header("Location: ../product.php");
            exit;
        }
            
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../product.php");
    exit;
}
