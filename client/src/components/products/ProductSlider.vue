<template>
    <aside>
        <article class="gallery-wrap">
            <div class="img-big-wrap">
                <div style="padding: 2rem" ref=""><a href="#">
                        <img src="../../assets/images/products/tainghemau.jpg" alt="product image"
                            style="width: 100%; height: 100%" /></a></div>
            </div>
            <div class="img-small-wrap">
                <div class="item-gallery"><img src="../../assets/images/products/tainghemaunho1.jpg" /></div>
                <div class="item-gallery"><img src="../../assets/images/products/tainghemaunho2.jpg"/></div>
                <div class="item-gallery"><img src="../../assets/images/products/tainghemaunho3.jpg"/></div>
                <div class="item-gallery"><img src="../../assets/images/products/tainghemaunho4.jpg"/></div>
            </div>
        </article>
    </aside>
</template>

<script>

export default {
    name: "ProductSlider",
}
</script>

<style scoped>
.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: auto;
    display: inline-block;
}



.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}

.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: pointer;
}
</style>
