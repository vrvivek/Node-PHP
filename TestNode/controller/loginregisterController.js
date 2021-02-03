const express = require("express");
const Bcrypt = require("bcryptjs");
const router = express.Router();
const mongoose = require('mongoose');
const User = mongoose.model('User');

router.post('/login',async (req,res)=>{
    try {
        var user = await User.findOne({userName:req.body.userName}).exec();
        //console.log(user);
        if(!user) {
            return res.status(400).render('login',{ message: "The username does not exist" });
        }
        if(!Bcrypt.compareSync(req.body.password, user.password)) {
            return res.status(400).render('login',{ message: "The password is invalid" });
        }
        req.session.status=true;
        req.session.name=user.userName;
        return res.status(400).redirect('/dept');
    } catch (error) {
        return res.status(500).send(error);
    }
});

router.get('/register',(req,res,next)=>{
    if(!req.session.status){
        res.render('register',{pageTitle:'Login'});
    }else
        redirect('/dept');
});

router.post("/register", async (request, response) => {
    try {
        var u = await User.findOne({userName:request.body.userName}).exec();
        if(!u)
        {
            request.body._id=mongoose.Types.ObjectId();
            request.body.password = Bcrypt.hashSync(request.body.password, 10);
            var user = new User(request.body);
            var result = await user.save();
            return response.status(400).redirect('/login');
        }else{
            return response.status(400).render('register',{ message: "Username Already Exists." });
        }
    } catch (err) {
        response.status(500).send(err,u);
    }
});

router.get('/login',(req,res,next)=>{
    if(req.session.status){
        res.redirect('/dept');
    }else
        res.render('login',{pageTitle:'Login'});
});

router.get('/logout',(req,res,next)=>{
    req.session.destroy((err) => {
        res.redirect('/login'); // will always fire after session is destroyed
    })
});

router.use((req,res,next)=>{
    if(req.session.status){
        next();
    }else
        res.redirect('/login');
        //res.render('login',{pageTitle:'Login'});
});

module.exports= router;