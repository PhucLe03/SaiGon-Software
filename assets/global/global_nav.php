<?php
$option = 0;
if (!isset($_SESSION)) {
  session_start();
}
?>

<style>
  #content-start {
    position: relative;
    top: 60px;
  }
</style>

<header>
  <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3 phuc_bg">
    <div class="container-fluid">
      <img class="phuc_logo" alt="SGSW" src="/assets/images/logo.png" />
      <a class="navbar-brand" href="/">BK EC</a>
      <div class="navbar-collapse collapse d-sm-inline-flex">
        <ul class="navbar-nav flex-grow-1 justify-content-evenly">
          <li class="nav-item dropdown">
            <a href="" class="dropdown-toggle phuc_nav_button phuc_nav" data-bs-toggle="dropdown">Danh mục sản phẩm<b class="caret"></b></a>
            <ul class="dropdown-menu ">
              <li><a href="/categories/pc.php" class="dropdown-item">PC</a></li>
              <li><a href="/categories/tainghe.php" class="dropdown-item">Tai nghe</a></li>
              <li><a href="/3" class="dropdown-item">link 3</a></li>
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
          <?php if (isset($_SESSION['username'])) {
            if ($_SESSION['tucach'] == "User") {
          ?>
          <li class="phuc_nav">
            <a class="nav-link" href="/exchange">Trao đổi</a>
          </li>
          <?php } }?>
          <li class="phuc_nav">
            <a class="nav-link" href="about.php">Liên hệ</a>
          </li>
        </ul>
      </div>
      <!-- </div> -->
      <div class="navbar-collapse collapse d-sm-inline-flex">
        <ul class="navbar-nav flex-grow-1 justify-content-end">
          <?php
          if (isset($_SESSION['username'])) {
            if ($_SESSION['tucach'] == "User") {
          ?>
              <li class="phuc_nav">
                <a class="nav-link" href="/cart">
                  <span class="material-symbols-outlined"> shopping_cart </span>Giỏ hàng</a>
              </li>
              <li class="phuc_nav">
                <a class="nav-link" href="/profile">
                  <span class="material-symbols-outlined"> person </span>
                  <?= $_SESSION['username'] ?></a>
              </li>
            <?php
            } else { ?>
            <li class="phuc_nav">
                <a class="nav-link" href="/cart">
                  <span class="material-symbols-outlined"> construction </span>Quản lý</a>
              </li>
              <li class="phuc_nav">
                <a class="nav-link" href="/admin">
                  <span class="material-symbols-outlined"> person </span>
                  <?= $_SESSION['username'] ?></a>
              </li>
            <?php
            }
            ?>
            <li class="phuc_nav">
                <a class="nav-link" href="/login/logout.php">
                  <span class="material-symbols-outlined"> logout </span>
                  Đăng xuất</a>
              </li>
            <?php

          } else {
            ?>
            <li class="phuc_nav">
              <a class="nav-link" href="/login">
                <span class="material-symbols-outlined"> person </span>
                Đăng nhập</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- <div id="content-start"></div> -->