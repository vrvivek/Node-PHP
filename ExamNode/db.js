const mongoose = require('mongoose');

exports.database = () => {
    mongoose.connect("mongodb://localhost:27017/ExamDB",{ useNewUrlParser:true,useUnifiedTopology: true,useCreateIndex:true},(err)=>{
        if(!err)
        {
            console.log("Connected");
        }
    });
}