<template>
  <div class="container mx-auto" style="padding: 6rem 0px;">
      <div class="card">
          <div class="row">
              <ProductSlider class="col-sm-5 border-right"></ProductSlider>
              <ProductDetail class="col-sm-7"></ProductDetail>
          </div>
      </div>
  </div>
</template>

<script>
  import ProductDetail from "../components/products/ProductDetail.vue";
  import ProductSlider from "../components/products/ProductSlider.vue";
  export default {
      name: "ProductDetailPage",
      components: {ProductSlider, ProductDetail},
      computed: {

      },
  }
</script>

