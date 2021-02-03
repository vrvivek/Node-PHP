const express = require("express");
const route = express.Router();
const mongoose = require('mongoose');
const Department = mongoose.model('Department');

route.get('/',(req,res)=>{
    Department.find((err,data)=>{
        if(!err){
            res.render('dept/index',{depts:data});
        }else
        console.log(err);
    });
}); 

route.post('/add',(req,res)=>{
    let dept = new Department({
        _id:mongoose.Types.ObjectId(),
        deptName:req.body.deptName
    });
    dept.save((err,data)=>{
        if(!err)
        {
            res.redirect('/dept');
        }
        else
        console.log(err);
    });
});

route.get('/del/:id',(req,res)=>{
    Department.findByIdAndDelete({_id:req.params.id},(err,data)=>{
        if(!err)
        {
            res.redirect('/dept');
        }
        else
            console.log(err);
    });
});

route.get('/edit/:id',(req,res)=>{
    Department.findById({_id:req.params.id},(err,data)=>{
        if(!err)
        {
            res.render('dept/update',{dept:data});
        }else
            console.log(err);
    })
});

route.post('/edit',(req,res)=>{
    Department.findByIdAndUpdate({_id:req.body._id},req.body,(err,data)=>{
        if(!err)
        {
            res.redirect('/dept');
        }
        else
            console.log(err);
    })
});
module.exports= route;