const path = require("path");
const express = require("express");
const bodyParser = require("body-parser");
const app = express();

require("dotenv").config(); // environment variable

app.use(bodyParser.json());
app.use(express.json());

const route = require("./routes/index");
const db = require('./app/config/db');  // connect to database

app.use(
    express.urlencoded({
        extended: true,
    })
);

// routes init
route(app);

//Listen on PC PORT
const port = process.env.PORT || 3001;
app.listen(port, () => {
    console.log(`Backend app listening at http://localhost:${port}`);
});
