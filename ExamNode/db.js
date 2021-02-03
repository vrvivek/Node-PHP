const mongoose = require('mongoose');

module.exports = mongoose.connect("mongodb://localhost:27017/ExamDB",{ useNewUrlParser:true,useUnifiedTopology: true,useCreateIndex:true},(err)=>{
        if(!err)
        {
            console.log("Connected");
        }
    });