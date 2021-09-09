const express = require("express");
const app = express();
const mongoose = require("mongoose");
// var user = require("./app.js");
// var userObj = user.Name;
const bodyParser = require("body-parser");

// Parsers for POST data
app.use(express.json({limit: '20mb'}));
app.use(express.urlencoded({ extended: false, limit: '20mb' }));

DB = "mongodb://localhost:27017/Book"

mongoose.connect(DB,{ useNewUrlParser: true ,useUnifiedTopology: true});

mongoose.connection.once('open',()=>{
   console.log("Connected to Db");

}).on('err',(err)=>{
   console.log('error is : ',err);
})

const NameSchema = new mongoose.Schema({
  username: String,
  authorname: String,
  bookname: String,
  genre: String,
  publisher: String,
  publicationyear: Number,
  bookreview: String
})

const Name = mongoose.model("formdatas",NameSchema);

app.get("/", (req,res)=>{
    res.sendFile(__dirname+ "/page3.html")
})

app.post("/posts",(req, res)=>{
    let newForm = new Name({
    username: req.body.username,
    authorname: req.body.authorname,
    bookname: req.body.bookname,
    genre: req.body.genre,
    publisher: req.body.publisher,
    publicationyear: req.body.publicationyear,
    bookreview: req.body.bookreview
    });
    newForm.save();
    res.send(newForm)
})
app.listen(3000, ()=>{
    console.log("server is running at 3000");
})
