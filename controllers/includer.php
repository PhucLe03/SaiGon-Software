<?php

include "../DB_conn.php";
include "cart_ctl.php";
include "product_ctl.php";
include "user_ctl.php";
include "payment_ctl.php";

function formatPrice($price) {
    return number_format($price, 0, '', ',');
}