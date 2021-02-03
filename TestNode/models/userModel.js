const mongoose = require('mongoose');

let userSchema = new mongoose.Schema({
     _id :mongoose.Schema.Types.ObjectId,
    userName:{
        type: String,
        unique: true,
        required:true
    },
    password:{
        type:String,
        required:true
    },
    fullName:{
        type:String
    },
    email:{
        type:String
    }    
});

mongoose.model('User',userSchema);

