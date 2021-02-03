require('./models/db');
const express = require("express");
const session = require('express-session');
const deptC = require('./controller/deptController');
const empC = require('./controller/empController');
const loginRegister = require('./controller/loginregisterController');

const app = express();

app.set('view engine','ejs');
app.set('views','views');
app.use(express.urlencoded({extended:false}));
app.use(session({secret:'!@#$%^&*',resave:false ,saveUninitialized:false}));

app.use(loginRegister);
app.use('/dept',deptC);
app.use('/emp',empC);
app.use('/',(req,res)=>{
    res.send("Hello");
});

app.listen(3001,()=>{
    console.log("start");
});