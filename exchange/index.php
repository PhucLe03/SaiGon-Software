<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $title = "Trao đổi";
        include "../header.php";
        ?>
    </title>
    <?php include "../assets/global/global_css.php" ?>
</head>

<body>
    <?php include "../assets/global/global_nav.php"; ?>
    <div class="container">
        <form class="login" method="post" action="exchange/process_exchange.php">
            <h1>Exchange</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="hh" placeholder="">
                        <label class="form-label">Chọn hàng bạn đã mua <span style="color: red;">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="sp" placeholder="">
                        <label class="form-label">Chọn sản phẩm muốn trao đổi <span style="color: red;">*</span></label>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <button type="submit" class="btn btn-primary">Gửi yêu cầu tao đổi</button>
                <!-- <br/> -->
                <a href="index.php" class="text-decoration-none">Về trang chủ</a>
            </div>
        </form>
    </div>
    <?php include "../footer.php";?>
</body>

</html>