const express = require("express");
const app = express();
require("dotenv").config();

const port = process.env.PORT || 3000;
app.use(express.json());
app.use(
  express.urlencoded({
    extended: true,
  })
);
app.get("/", (req, res) => {
  res.json({ message: "ok", status: "okay" });
});
app.listen(port, () => {
  console.log(`Backend app listening at http://localhost:${port}`);
});
