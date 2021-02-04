<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center style="border: 2px solid;">
	<h2>User Profile</h2>
	<br/>

	<img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" src="<?= $_SESSION['ProfilePic']?>">
	<br/>
	<br/>
	<div style="font-size: 20px;"><b>Username</b> : <?= $_SESSION['username']?></div>
	<br/>
	<div style="font-size: 20px;"><b>Email</b>: <?= $_SESSION['email']?></div>
</center>
</body>
</html>