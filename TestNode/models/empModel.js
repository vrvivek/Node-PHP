const mongoose = require('mongoose');

let empSchema = new mongoose.Schema({

    fullName:{
        type:String
    },
    email:{
        type:String
    },
    city:{
        type:String
    },
    deptID :{
        type:mongoose.Schema.Types.ObjectId,
        ref:'Department'
    }
    
});

mongoose.model('Employee',empSchema);

