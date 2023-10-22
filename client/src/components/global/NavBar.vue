<template>
  <html lang="en">
    <header>
      <nav
        class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3 phuc_bg"
      >
        <div class="container-fluid">
          <img
            class="phuc_logo"
            alt="SGSW"
            src="../assets/images/sgswlogo.png"
          />
          <a class="navbar-brand" href="home">BK EC</a>
          <div
            class="navbar-collapse collapse d-sm-inline-flex"
          >
            <ul class="navbar-nav flex-grow-1 justify-content-evenly">
              <li>
                <div class="dropdown">
                  <div
                    class="dropdown-toggle phuc_nav_button phuc_nav"
                    type="button"
                    id="dropdownProductButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Sản phẩm {{ productdropdown }}
                  </div>
                  <ul
                    class="dropdown-menu phuc_nav"
                    aria-labelledby="dropdownProductButton"
                  >
                    <li class="" v-for="option in products" :key="option">
                      <a
                        class="dropdown-item"
                        @click="productdropdown = option"
                        :href="option.link"
                        >{{ option.title }}</a
                      >
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
            <!-- <div class="form-floating mb">
              <input class="form-control" placeholder="" type="search"/>
              <label class="form-label">Bạn muốn tìm gì</label>
            </div> -->
            <form class="form-inline">
              <input
                class="form-control"
                type="search"
                placeholder="Bạn muốn tìm gì"
                aria-label="Search"
              />
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
                  <span class="material-symbols-outlined"> shopping_cart </span
                  >Giỏ hàng</a
                >
              </li>
              <li class="phuc_nav">
                <a class="nav-link" href="login">
                  <span class="material-symbols-outlined"> person </span>
                  Đăng nhập</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </html>
</template>

<script>
export default {
  name: "AppHeader",
  data() {
    return {
      products: [
        { title: "A", link: "AA" },
        { title: "B", link: "BB" },
      ],
    };
  },
};
</script>

<style scoped>
#app {
  font-family: Helvetica, Arial, sans-serif, Avenir;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
}
</style>
