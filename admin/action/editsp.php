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

    // $check = getProductByID($mssp,$conn);
    // if ($check!=0) {
    //     $em = "a"; $_SESSION['error'] = $em;
    //     header("Location: ../editproduct.php?id=$mssp");
    //     exit;
    // }
    
    $cate = $_POST['cate'];
    
    $ten = $_POST['ten'];
    $cost = $_POST['cost'];
    $origin = $_POST['origin'];
    $noidung = $_POST['noidung'];

    $_SESSION['ten'] = $ten;
    $_SESSION['cost'] = $cost;
    $_SESSION['cate'] = $cate;
    $_SESSION['origin'] = $origin;
    $_SESSION['noidung'] = $noidung;
    
    $flag = false;
    $allcates = getAllCategory($conn);
    foreach ($allcates as $c) {
        if ($c['cID']==$cate) {
            $flag = true; break;
        }
    }
    if ($flag!=true) {
        $em  = "o"; $_SESSION['error'] = $em;
        $_SESSION['emess'] = "Danh mục không hợp lệ";
        header("Location: ../editproduct.php?id=$mssp");
        exit;
    }

    if (empty($mssp) || empty($ten) || empty($cate) || 
        empty($origin) || empty($noidung)) {
        $em = "m"; $_SESSION['error'] = $em;
        header("Location: ../editproduct.php?id=$mssp");
        exit;
    } else {
        // Thêm SP
        try {
            $type = "Medium";
            $sql = "UPDATE products
                    SET prName=:na ,price=:pr, category=:ca, `type`=:ty, origin=:ori, `desc`=:de
                    WHERE productID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':na', $ten);
            $stmt->bindParam(':pr', $cost);
            $stmt->bindParam(':ca', $cate);
            $stmt->bindParam(':ty', $type);
            $stmt->bindParam(':ori', $origin);
            $stmt->bindParam(':de', $noidung);
            $stmt->bindParam(':id', $mssp);
            $stmt->execute();
            
            unset($_SESSION['ten']);
            unset($_SESSION['cost']);
            unset($_SESSION['cate']);
            unset($_SESSION['origin']);
            unset($_SESSION['noidung']);
            header("Location: ../viewproduct.php?id=$mssp");
            exit;
        } catch (PDOException $e) {
            $em  = "o"; $_SESSION['error'] = $em;
            $_SESSION['emess'] = $e->getMessage();
            header("Location: ../editproduct.php?id=$mssp");
            exit;
        }
            
    }
} else {
    $em  = "o"; $_SESSION['error'] = $em;
    $_SESSION['emess'] = "Đã xảy ra lỗi";
    header("Location: ../editproduct.php?id=$mssp");
    exit;
}
