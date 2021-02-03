const mongoose = require('mongoose');

let deptSchema = new mongoose.Schema({
    _id :mongoose.Schema.Types.ObjectId,
    deptName:{
        type:String
    }
});

mongoose.model('Department',deptSchema);