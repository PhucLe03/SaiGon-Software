<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../controllers/includer.php";
include "./admin_ctl/admin.php";
if (isset($_SESSION['username'])) {
    if ($_SESSION['tucach'] != "Admin") {
        header("Location: ../login");
        exit;
    }
    $user = getAdminInfo($_SESSION['username'], $conn);
    if (!isset($_GET['id'])) {
        header("Location: product.php");
        exit;
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            $title = "Xác nhận xóa sản phẩm";
            include "../header.php";
            ?>
        </title>
        <?php include "../assets/global/global_css.php" ?>
    </head>

    <body>
        <?php
        include "../assets/global/global_nav.php";
        ?>
        <div class="container mt-5">
            <h1>Xóa sản phẩm</h1>
            <div class="container-fluid">
                <a href="/admin/product.php" class="text-decoration-none">
                    Quản lý sản phẩm
                </a>/ Xóa sản phẩm
            </div>
            <?php
            $prod = getProductByID($_GET['id'],$conn);
            ?>
            <div class="row">
                <div class="">
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <h3>Xóa sản phẩm?</h3>
                            <hr />
                        </div>
                        <div class="container-fluid">
                            <?php
                            // $err_stmt = $_GET['error'];
                            if (isset($_SESSION['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    $err_stmt = $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    if ($err_stmt == "m") {
                                        $err = "Các thông tin không được để trống";
                                    } else if ($err_stmt == "a") {
                                        $err = "Mã sản phẩm đã có trong danh sách";
                                    } else {
                                        // $err = "Đã có lỗi xảy ra";
                                        $err = $_SESSION['emess'];
                                        unset($_SESSION['emess']);
                                    }
                                    // echo $err;
                                    ?>
                                    <?= $err ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="mssp" placeholder="" value="<?=$prod['productID']?>" disabled>
                                        <label class="form-label">Mã SP <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ten" placeholder="" value="<?=$prod['prName']?>" disabled>
                                        <label class="form-label">Tên SP <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" min=10000 class="form-control" name="cost" placeholder="" value="<?=$prod['price']?>" disabled>
                                        <label class="form-label">Giá <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" list="cate" class="form-control" name="cate" placeholder="" value="<?=$prod['category']?>" disabled>
                                        <label class="form-label">Danh mục <span style="color: red;">*</span></label>
                                        <datalist id="cate">
                                        <?php
                                            $allcate = getAllCategory($conn);
                                            foreach ($allcate as $c) {
                                            ?>
                                                <option value="<?= $c['cID'] ?>"> <?= $c['cName'] ?> </option>

                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" list="ori" class="form-control" name="origin" placeholder="" value="<?=$prod['origin']?>" disabled>
                                        <label class="form-label">Xuất xứ <span style="color: red;">*</span></label>
                                        <datalist id="ori">
                                            <option value="Việt Nam"></option>
                                            <option value="Mỹ"></option>
                                            <option value="Đức"></option>
                                            <option value="Anh Quốc"></option>
                                            <option value="Trung Quốc"></option>
                                        </datalist>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                        <label class="form-label">Mô tả: <span style="color: red;">*</span></label>
                                        <textarea class="form-control" name="noidung" rows="4" 
                                        placeholder="" disabled><?=$prod['desc']?></textarea>
                                    </div>
                            </div>
                            <form method="post" action="action/deletesp.php">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary" style="background-color: red;">Xóa</button>
                                </div>
                                <input name="deleteID" value="<?=$prod['productID']?>" style="visibility: hidden;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../footer.php"; ?>
    </body>

    </html>

<?php } else {
    header("Location: ../login");
    exit;
}
?>