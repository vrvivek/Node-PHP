const express = require("express");
const mongoose = require('mongoose');
const  database = require('./db');
const Student =  require('./StudentModel');


const app = express();

app.set('view engine','ejs');
app.set('views','views');

app.use(express.urlencoded({extended:false}));

app.post('/add',(req,res)=>{
    req.body._id=mongoose.Types.ObjectId();
    let s = new Student(req.body);
    s.save((err,data)=>{
        if(!err)
        {
            res.render('index',{data:"Student Added Successfully"});
        }
        else
        console.log(err);
    });
});

app.use('/',(req,res)=>{
    res.render("index");
});

app.listen(3001,()=>{
    console.log("start");
});