const express = require("express");
const router = express.Router()
const CartController = require('../app/controllers/CartController')


router.delete('/users/:userId/cart/:productId', CartController.DeleteProduct)

module.exports = router