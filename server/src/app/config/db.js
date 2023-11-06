const mysql = require("mysql2");
require("dotenv").config();

const pool = mysql.createPool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    database: process.env.DB_NAME,
    password: process.env.DB_PASS,

    // host: "localhost",
    // user: "root",
    // database: "do-an",
    // password: "duynguyen",
});

let sql = "SELECT * FROM user";

pool.execute(sql, function (err, result) {
    if (err) {
        console.log("ERROR SQL");
        console.log(process.env.DB_HOST);
        throw err;
    }
    //console.log(result);
    console.log("Connected Database!!")
    // result.forEach((res) => {
    //     console.log(res.username);
    // });
});

module.exports = pool.promise();
