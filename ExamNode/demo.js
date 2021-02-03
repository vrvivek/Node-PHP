require('./db');
const express = require("express");
const mongoose = require('mongoose');
const Student = mongoose.model('Student');

const app = express();

app.set('view engine','ejs');
app.set('views','views');

app.use(express.urlencoded({extended:false}));

app.post('/add',(req,res)=>{
    //const data = new Student(req.body); 
    data = ;
    data.save((err,data)=>{

    })
    
});

app.use('/',(req,res)=>{
    res.render("index");
});

app.listen(3001,()=>{
    console.log("start");
});