<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "BKEC - Đăng nhập";
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<body>
    <?php
    include "../assets/global/global_nav.php";
    ?>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="../login/process_login.php">

                <div class="text-center">
                    <img src="../assets/images/logo.png" width="100" alt="LOGO" style="border-radius: 50%;">
                </div>
                <hr />
                <h3 class="text-center">ĐĂNG NHẬP</h3>
                <hr />
                <?php
                // $err_stmt = $_GET['error'];
                if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        $err_stmt = $_GET['error'];
                        if ($err_stmt == "unp") {
                            $err = "Tên đăng nhập và Mật khẩu không được để trống";
                        } else if ($err_stmt == "u") {
                            $err = "Tên đăng nhập không được trống";
                        } else if ($err_stmt == "p") {
                            $err = "Mật khẩu không được để trống";
                        } else if ($err_stmt == "w") {
                            $err = "Tên đăng nhập hoặc mật khẩu sai";
                        } else {
                            $err = "Đã có lỗi xảy ra";
                        }
                        // echo $err;
                        ?>
                        <?= $err ?>
                    </div>
                <?php } ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="uname" placeholder=""
                    value="<?php
                        if (isset($_SESSION['uname'])) echo $_SESSION['uname'];
                        ?>">
                    <label class="form-label">Tên đăng nhập <span style="color: red;">*</span></label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="pass" placeholder=""
                    value="<?php
                        if (isset($_SESSION['pass'])) echo $_SESSION['pass'];
                    ?>">
                    <label class="form-label">Mật khẩu <span style="color: red;">*</span></label>
                </div>

                <div class="text-end">
                    <a href="login/quenmk.php">Quên mật khẩu</a>
                </div>

                <hr />
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <a href="../index.php" class="text-decoration-none">Về trang chủ</a>
            </form>

            <br /><br />
            <div class="container"></div>
            <?php
                unset($_SESSION['uname']);
                unset($_SESSION['pass']);
            ?>
        </div>
    </div>
    <?php include "../footer.php"; ?>
</body>

</html>