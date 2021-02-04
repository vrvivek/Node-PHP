<?php
	session_start();
	if(isset($_SESSION["username"]))
		header("location: home.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="model.php" method="post">
Username : <input type="text" name="username" placeholder="Username"><br><br>
Password : <input type="text" name="password" placeholder="Password"><br>
<input type="submit" name="btnlogin" value="Login">
</form>


<br>
<a href="registration.php">registration</a>
</body>
</html>