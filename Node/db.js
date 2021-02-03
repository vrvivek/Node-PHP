const mongoose = require('mongoose')

exports.database = () => {
    mongoose.connect("mongodb://localhost:27017/test",{ useUnifiedTopology: true, useNewUrlParser: true })
    .then(() => console.log("Database connected"))
    .catch(() => console.log(err))
}