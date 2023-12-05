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
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            $title = "Quản lý sản phẩm";
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
            <h1>Quản lý sản phẩm</h1>
            <div class="container-fluid">
                <a href="/admin" class="text-decoration-none">
                    Quay lại
                </a>
            </div>
            <?php
            $allSP = getAllSP($conn);
            ?>
            <div class="row">
                <div class="col card">
                    <div class="d-flex justify-content-center">
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                    <?php
                    if ($allSP != 0) {
                    ?>
                        <table class="table table-sm table-bordered mt-3 n-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá (VNĐ)</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Xuất xứ</th>
                                    <th scope="col">Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($allSP as $sp) {
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $i;
                                            $i++; ?>
                                        </th>
                                        <td scope="row"><?= $sp['productID'] ?></td>
                                        <td scope="row">
                                            <a href="/product/detail.php?id=<?=$sp['productID']?>">
                                                <?= $sp['prName'] ?>
                                            </a>
                                        </td>
                                        <td scope="row"><?= formatPrice($sp['price']) ?></td>
                                        <td scope="row"><?= $sp['category'] ?></td>
                                        <td scope="row"><?= $sp['origin'] ?></td>
                                        <td scope="row"><?= $sp['desc'] ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else { ?>
                        <div class="alert alert-info" role="alert">
                            Chưa có sản phẩm.
                        </div>
                    <?php } ?>
                </div>
                <div class="col-4">
                    <form class="card" method="post" action="action/addsp.php">
                        <div class="d-flex justify-content-center">
                            <h3>Thêm sản phẩm</h3>
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
                                <div class="col-5">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="mssp" placeholder="" value="<?php
                                        if (isset($_SESSION['mssp'])) {
                                            echo $_SESSION['mssp']; unset($_SESSION['mssp']);
                                        }
                                        ?>">
                                        <label class="form-label">Mã SP <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ten" placeholder="" value="<?php
                                        if (isset($_SESSION['ten'])) {
                                            echo $_SESSION['ten']; unset($_SESSION['ten']);
                                        }
                                        ?>">
                                        <label class="form-label">Tên SP <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="number" min=10000 class="form-control" name="cost" placeholder="" value="<?php
                                        if (isset($_SESSION['cost'])) {
                                            echo $_SESSION['cost']; unset($_SESSION['cost']);
                                        } else echo 10000;
                                        ?>">
                                        <label class="form-label">Giá <span style="color: red;">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" list="cate" class="form-control" name="cate" placeholder="" value="<?php
                                        if (isset($_SESSION['cate'])) {
                                            echo $_SESSION['cate']; unset($_SESSION['cate']);
                                        }
                                        ?>">
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
                                        <input type="text" list="ori" class="form-control" name="origin" placeholder="" value="<?php
                                        if (isset($_SESSION['origin'])) {
                                            echo $_SESSION['origin']; unset($_SESSION['origin']);
                                        }
                                        ?>">
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
                                        placeholder=""><?php
                                            if (isset($_SESSION['noidung'])) {
                                                echo $_SESSION['noidung'];
                                            }
                                        ?></textarea>
                                    </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                            <input style="visibility: hidden;" name="class" value="<?= $id_lophoc ?>">
                        </div>
                    </form>
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