const db = require('../config/db');

class CartController{

    DeleteProduct(req, res){
        res.send("DELETE PRODUCT FROM CART");
    }
    
}

module.exports = new CartController;