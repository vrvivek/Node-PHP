<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
<center><h5>Registration</h5>
<form action="model.php" method="post" enctype="multipart/form-data">

	Username<input type="text" name="username" placeholder="Username"><br>
	Password<input type="text" name="password" placeholder="Password"><br>
	Profile Pic<input type="file" name="profilepic" class="form-control" placeholder="Enter DOB"/><br>
	Email<input type="text" name="email" placeholder="Email"><br>
	<input type="submit" name="btnregister" value="Register">
</form>
</body>
</html>