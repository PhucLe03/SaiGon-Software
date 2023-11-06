const express = require("express");
const router = express.Router()
const ProductController = require('../app/controllers/ProductController')

router.get('/products', ProductController.ShowAllProducts)
router.get('/users/:userId/cart', ProductController.ShowCart)
router.get('/products/productId', ProductController.ShowProductDetail)
router.post('/users/:userId/cart', ProductController.AddProductToCart)


module.exports = router