const express = require("express");
const multer = require("multer");
const cors = require("cors");
const path = require("path");

const app = express();

app.use(cors());

app.use(express.json());

app.use("/uploads", express.static("uploads"));

const storage = multer.diskStorage({

  destination: (req, file, cb) => {

    cb(null, "uploads/");
  },

  filename: (req, file, cb) => {

    cb(

      null,

      Date.now() +

      path.extname(file.originalname)
    );
  },
});

const upload = multer({ storage });

app.post(

  "/upload",

  upload.single("image"),

  (req, res) => {

    const image =
        req.file.filename;

    res.json({

      message:
          "Image Uploaded",

      image:
          image,
    });
  },
);

app.listen(3000, () => {

  console.log("Server Running");

});