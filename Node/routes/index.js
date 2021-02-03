var express = require('express');
var router = express.Router();
const USER = require('../models/user');

// new USER({
//     name : "demo",
//     email: "Demo"
//   }).save()

router.get('/form',function(req,res,next){
  res.render('index');
})

/**
 * Create new user
 */
router.post('/', function(req, res, next) {
  // let user = new USER({
  //   name : req.body.name,
  //   email: req.body.email
  // })

  // user.save()
  // .then((data) => res.send(data))
  // .catch((err) => res.send(err))

  USER.create(req.body)
  .then((data) => res.send(data))
  .catch((err) => res.send(err))
});

/**
 * get all user
 */
router.get('/', function(req, res, next) {
  USER.find({})
  .then((data) => res.send(data))
  .catch((err) => res.send(err))
});

/**
 * get particular user
 */
router.get('/:id',( req,res,next )=>{
  USER.findById(req.params.id).then((data) => res.send(data))
  .catch((err) => res.send(err))
})

/**
 * update user
 */
router.post('/:id',(req,res,next)=>{
  USER.findByIdAndUpdate(req.params.id,req.body,{ new: true })
  .then((data) => res.send(data))
  .catch((err) => res.send(err))
})

/**
 * remove particular user
 */
router.get('/:id',(req,res,next) => {
  USER.findByIdAndDelete(req.params.id)
  .then((data) => res.send(data))
  .catch((err) => res.send(err))
})

module.exports = router;
