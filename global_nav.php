<?php
$option = 0;

?>
<!-- <style>
  .dropdown {
    float: left;
    overflow: hidden;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style> -->
<script>
  $(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
      var elmnt = $(this).parent().parent();
      if (!elmnt.hasClass('nav')) {
        var li = $(this).parent();
        var heightParent = parseInt(elmnt.css('height').replace('px', '')) / 2;
        var widthParent = parseInt(elmnt.css('width').replace('px', '')) - 10;

        if (!li.hasClass('open')) li.addClass('open').siblings().removeClass('open');
        else li.removeClass('open');
        $(this).next().css('top', heightParent + 'px');
        $(this).next().css('left', widthParent + 'px');

        return false;
      }
    })
  })
</script>

<head>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<header>
  <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3 phuc_bg">
    <div class="container-fluid">
      <img class="phuc_logo" alt="SGSW" src="assets/images/logo.png" />
      <a class="navbar-brand" href="/">BK EC</a>
      <div class="navbar-collapse collapse d-sm-inline-flex">
        <ul class="navbar-nav flex-grow-1 justify-content-evenly">
          <li>
            <a href="" class="dropdown phuc_nav_button phuc_nav" data-toggle="dropdown">Danh mục sản phẩm<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="1">link 1</a></li>
              <li><a href="2">link 3</a></li>
              <li><a href="3">link 2</a></li>
            </ul>
          </li>
        </ul>
        <!-- <div class="form-floating mb">
              <input class="form-control" placeholder="" type="search"/>
              <label class="form-label">Bạn muốn tìm gì</label>
            </div> -->
        <form class="form-inline">
          <input class="form-control" type="search" placeholder="Bạn muốn tìm gì" aria-label="Search" />
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
        </form>
        <ul class="navbar-nav flex-grow-1 justify-content-evenly">
          <li class="phuc_nav">
            <a class="nav-link" href="privacy">Trao đổi</a>
          </li>
          <li class="phuc_nav">
            <a class="nav-link" href="about">Liên hệ</a>
          </li>
        </ul>
      </div>
      <!-- </div> -->
      <div class="navbar-collapse collapse d-sm-inline-flex">
        <ul class="navbar-nav flex-grow-1 justify-content-end">
          <li class="phuc_nav">
            <a class="nav-link" href="cart">
              <span class="material-symbols-outlined"> shopping_cart </span>Giỏ hàng</a>
          </li>
          <li class="phuc_nav">
            <a class="nav-link" href="login">
              <span class="material-symbols-outlined"> person </span>
              Đăng nhập</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>