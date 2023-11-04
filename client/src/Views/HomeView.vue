<template>
  <div class=" container">
    <div class="slider">
      <Splide :options="options" aria-label="My Favorite Images">
        <SplideSlide>
          <img src="../assets/images/slider/1.jpg" alt="Sample 1">
        </SplideSlide>
        <SplideSlide>
          <img src="../assets/images/slider/118_km_pc_900.png" alt="Sample 2">
        </SplideSlide>
        <SplideSlide>
          <img src="../assets/images/slider/20230224_vIMZwzLoe8zo4oMq.jpeg" alt="Sample 3">
        </SplideSlide>
        <SplideSlide>
          <img src="../assets/images/slider/pc_gaming_02e3e03f1a78496f9a17ddd5bbc4cdac.webp" alt="Sample 4">
        </SplideSlide>
      </Splide>
    </div>
  </div>
  <div class="product text-md-left">
      <div class="row  text-md-left">
        <div class="col-md-1 col-lg-1 col-xl-1 mx-auto mt-3">
          <p><img src="../assets/images/quangcao1.png" alt="Advertisement 1"></p>
        </div>
        <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-3">
<div class="overflow-hidden">
  <h1 text-uppercase mb-4 font-weight-bold text-warning>PC bán chạy</h1>
  <div class="row gy-5">
    <!-- product 1 -->
    <div class="col-6 p-3 ">
      <div class="row">
        <div class="col-md-4 ">
          <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
        </div>
        <div class="col-md-4">
          <div class="newProduct">
            Sản phẩm mới
          </div>
          <div class="nameOfProduct">
            {{product}}
          </div>
          <div class="accessoryOfProduct">
            {{accessory}}
          </div>
          <div class="priceOfProduct">
            {{price}}
          </div>
        </div>
      </div>
    </div>
    <!-- product 2 -->
    <div class="col-6 p-3 ">
      <div class="row">
        <div class="col-md-4 ">
          <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
        </div>
        <div class="col-md-4">
          <div class="newProduct">
            Sản phẩm mới
          </div>
          <div class="nameOfProduct">
            {{product}}
          </div>
          <div class="accessoryOfProduct">
            {{accessory}}
          </div>
          <div class="priceOfProduct">
            {{price}}
          </div>
        </div>
      </div>
    </div>
    <!-- product 3 -->
    <div class="col-6 p-3 ">
      <div class="row">
        <div class="col-md-4 ">
          <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
        </div>
        <div class="col-md-4">
          <div class="newProduct">
            Sản phẩm mới
          </div>
          <div class="nameOfProduct">
            {{product}}
          </div>
          <div class="accessoryOfProduct">
            {{accessory}}
          </div>
          <div class="priceOfProduct">
            {{price}}
          </div>
        </div>
      </div>
    </div>
    <!-- product 4 -->
    <div class="col-6 p-3 ">
      <div class="row">
        <div class="col-md-4 ">
          <img src="../assets/images/pc.png" alt="this is logo" height="150" width="150">
        </div>
        <div class="col-md-4">
          <div class="newProduct">
            Sản phẩm mới
          </div>
          <div class="nameOfProduct">
            {{product}}
          </div>
          <div class="accessoryOfProduct">
            {{accessory}}
          </div>
          <div class="priceOfProduct">
            {{price}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="col-md-1 col-lg-10 col-xl-1 mx-auto mt-3">
          <p><img src="../assets/images/quangcao2.png" alt="Advertisement 2"></p>
        </div>
      </div>
    </div>
 
</template>


<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { defineComponent } from 'vue';


export default defineComponent( {
  components: {
    Splide,
    SplideSlide,
  },


  setup() {
    const options = {
      rewind: true,
      gap   : '1rem',
    };
    return { options };
  },

  data() {
    return {
      product: 'PC GVN Gaming AMD R5-5600X/ VGA RTX 3050',
      accessory: 'RTX 4090 32GB Z790 1TB i9 14900K',
      price: '19.190.000₫'
    };
  }
} );



</script>


<style lang="scss" scoped>
.container{
  width: 100%;
  height: auto;
  margin-top: 100px;
  margin-bottom: 20px;
}
.slider{
  width: 100%;
  height: 500px;
}
.splide__slide img{
  height:500px;
  object-fit: cover;
  display: block;
  width: 100%;
}
.newProduct{
  width: 130px;
  background-color: rgb(2, 154, 2);
  color: white;
  border-radius: 10px;
  text-align: center;
  font-weight: bold;
}
.nameOfProduct{
  font-weight: bold;
  padding-top: 5px;
  padding-bottom: 5px;
}
.accessoryOfProduct{
  background-color:rgb(166, 166, 166);
}
.priceOfProduct{
  color:red;
  font-size:larger;
  font-weight: bold;
}
</style>
