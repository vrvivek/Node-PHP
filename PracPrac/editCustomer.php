<?php
	include 'connection.php';
	$data;
	if(isset($_GET['EditCid']))
	{
		$id=$_GET['EditCid'];
		$getCustDataQry="SELECT * FROM customer_master WHERE customer_id=$id";
		$data=mysqli_query($conn,$getCustDataQry);
		//header("location : editCustomer.php?$getCustDataQry");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
</head>
<body>
<h1>Edit</h1>
	<form action="model.php" method="post">
		<?php
			while ($row = mysqli_fetch_assoc($data)) {
		?>
		<input type="hidden" name="customer_id" value="<?=$row['customer_id']?>">
		<input type="text" name="name" placeholder="Name" value="<?=$row['name']?>">
		<input type="text" name="email" placeholder="Email" value="<?=$row['email']?>">
		<input type="number" name="rating" placeholder="Rating" value="<?=$row['rating']?>">
		<input type="text" name="address" placeholder="Address" value="<?=$row['address']?>">
		<input type="number" name="contact_no" placeholder="Phone Number" value="<?=$row['phone_number']?>">
		<?php
			}
		?>
		<input type="submit" name="btnupd" value="Update Customer">
	</form>
</body>
</html>