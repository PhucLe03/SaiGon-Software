const db = require('../config/db');
const ProductModel =require('../models/ProductModel');

class ProductController{
    //ALL FROM DATABASE
    ShowAllProducts(req, res){
        res.send("API SHOW ALL PRODUCTS")
    }

    ShowCart(req, res){
        res.send("API SHOW PRODUCTs IN CART");
    }

    ShowProductDetail(req,res){
        res.send("API SHOW PRODUCT DETAIL")
    }

    AddProductToCart(req,res){
        res.send("API ADD PRODUCT TO CART")
    }

}

module.exports = new ProductController;