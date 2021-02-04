<?php

session_start();
include 'connection.php';
if(!isset($_SESSION["username"]))
{
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<center><h1>Home Page</h1></center><!-- <a href="model.php/logout">Logout</a> -->
	<form action="model.php" method="post">
		<input type="submit" value="Logout" name="btnlogout">
	</form>
	<br>
	<h1><a href="profile.php">Profile</a></h1>
	<a href="model.php?logout">Logout</a>
	<center>
		<table style="width:100%" border="1">
		  <tr>
		    <th>Name</th>
		   	<th>Email</th>
		    <th>Address</th>
		    <th>Rating</th>
		    <th>Contact No</th>
		    <th>Edit</th>
		    <th>Delete</th>
		  </tr>
		  <?php
		  	$qry="SELECT * FROM customer_master";
		  	$data=mysqli_query($conn,$qry);
		  	while($row = mysqli_fetch_assoc($data)) { 
		  ?>
		  <tr>
		    <td><?= $row["name"]?></td>
		    <td><?= $row["email"]?></td>
		    <td><?= $row["rating"]?></td>
		    <td><?= $row["address"]?></td>
		    <td><?= $row["phone_number"]?></td>
		    <td><a href="editCustomer.php?EditCid=<?=$row['customer_id']?>">Edit</a></td>
		    <td><a href="model.php?delCustID=<?=$row['customer_id']?>">Delete</a></td>
		  </tr>
		  <?php
		  	}
		  ?>
		</table>
	</center>
</body>
</html>