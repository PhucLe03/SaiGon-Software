const productsRouter = require('./products')
const productDetailRouter = require('./productDetail')
const cartRouter = require('./cart')

function route(app) {

    app.use("/products", productsRouter)
    app.use("productDetail", productDetailRouter)
    app.use("cart", cartRouter)

    
}

module.exports = route;
