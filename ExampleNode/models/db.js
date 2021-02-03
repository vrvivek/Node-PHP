const mongoose = require('mongoose');

mongoose.connect("mongodb://localhost:27017/EmpDB",{ useNewUrlParser:true,useUnifiedTopology: true,useCreateIndex:true},(err)=>{
    if(!err)
    {
        console.log("Connected");
    }
});

require('../models/deptModel');
require('../models/empModel');
require('../models/userModel');