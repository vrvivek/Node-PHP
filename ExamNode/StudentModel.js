const mongoose = require('mongoose');

let StudentSchema = new mongoose.Schema({
    _id :mongoose.Schema.Types.ObjectId,
    StudentName:{
        type:String
    },
    Address:{
        type:String
    },
    PhoneNo:{
        type:String
    }
});

module.exports = mongoose.model('Student',StudentSchema);