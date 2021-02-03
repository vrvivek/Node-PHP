const express = require("express");
const route = express.Router();
const mongoose = require('mongoose');
const Employee = mongoose.model('Employee');
const Department = mongoose.model('Department');

route.get('/',(req,res)=>{
    Employee.find().populate('deptID').exec().then(data=>{
            Department.find((err,data1)=>{
                if(!err){
                    res.render('emp/index',{emps:data,depts:data1});
                }else
                console.log(err);
            });
    });
});

route.post('/add',(req,res)=>{
    let emp = new Employee(req.body);
    emp.save((err,data)=>{
        if(!err)
        {
            res.redirect('/emp');
        }
        else
        console.log(err);
    });
});

route.get('/del/:id',(req,res)=>{
    Employee.findByIdAndDelete({_id:req.params.id},(err,data)=>{
        if(!err){
            res.redirect('/emp');
        }
        else
            console.log(err);
    });
});

route.get('/edit/:id',(req,res)=>{
    Employee.findById({_id:req.params.id},(err,data)=>{
        Department.find((err,data1)=>{
            if(!err){
                res.render('emp/update',{emp:data,depts:data1});
            }else
            console.log(err);
        });
    })
});

route.post('/edit',(req,res)=>{
    Employee.findByIdAndUpdate({_id:req.body._id},req.body,(err,data)=>{
        if(!err)
        {
            res.redirect('/emp');
        }
        else
            console.log(err);
    })
});

module.exports= route;