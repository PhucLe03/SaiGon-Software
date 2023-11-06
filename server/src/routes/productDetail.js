const express = require("express");
const router = express.Router()
const DetailController = require('../app/controllers/DetailController')

router.post('/users/:userId/cart', DetailController.AddProductToCart)

module.exports = router