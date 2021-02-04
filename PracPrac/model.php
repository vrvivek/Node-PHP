<?php
	require_once "connection.php";
	session_start();
	
	//Login
	if (isset($_POST["btnlogin"])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$qry="SELECT * FROM tblseller WHERE username='$username' AND password='$password'";
		$login=mysqli_query($conn,$qry);
		if(mysqli_num_rows($login) > 0)
        {
            while($row = mysqli_fetch_assoc($login))
            {
                $_SESSION["username"] = $row["username"];
                $_SESSION["ProfilePic"]=$row["profilePic"];
                $_SESSION["email"]=$row["email"];
                header("Location: login.php");
            }
        }
	}
	//Logout
	if (isset($_POST["btnlogout"])) {
		session_destroy();
		header("location: home.php");
	}
	if (isset($_GET["logout"])) {
		session_destroy();
		header("location: home.php");
	}

	//update customer
	if(isset($_POST['btnupd']))
	{
		$cid=$_POST['customer_id'];
		$email=$_POST['email'];
		$name=$_POST['name'];
		$address=$_POST['address'];
		$rating=$_POST['rating'];
		$contact_no=$_POST['contact_no'];

		$updQry="UPDATE customer_master SET email='".$email."',name='".$name."',rating=".$rating.",address='".$address."',phone_number=".$contact_no." WHERE customer_id=".$cid."";
		if(mysqli_query($conn,$updQry))
		{
			header("location: home.php");
		}
		else{
			echo mysqli_error($conn);
		}
	}

	//Delete Customer
	if(isset($_GET['delCustID']))
	{
		$id=$_GET['delCustID'];
		$delCustQry="DELETE FROM customer_master WHERE customer_id=$id";
		if(mysqli_query($conn,$delCustQry))
		{
			header("location: home.php");
		}
		else{
			echo "Delete fail";
		}
	}
	//File Upload
	if(isset($_POST["btnregister"]))
    {
        if(isset($_FILES['profilepic']))
        {
            $uname = $_POST["username"];
            $password= $_POST["password"];
            $email = $_POST["email"];
            $image = $_FILES["profilepic"];
            $filename = $image['name'];  //image.jpg
            $fileerror = $image['error'];
            $filetmp = $image['tmp_name'];


            $fileext = explode('.',$filename);  // image , jpg
            $filecheck = strtolower(end($fileext)); //jpg

            $fileextstored = array('png','jpg','jpeg');

            if(in_array($filecheck,$fileextstored)){
                $profilePath = 'ProfilePicture./'.$filename;
                move_uploaded_file($filetmp,$profilePath); 
            }

            $insert_query = "INSERT INTO `tblseller`(`username`,`password`,`profilePic`,`email`) VALUES ('$uname','$password','$profilePath','$email')";

            if(mysqli_query($conn,$insert_query))
            {
               echo json_encode(array("statusCode"=>200));
              header("Location: profile.php");
            }
            else{
                echo"Error: " .$insert_query. "<br>" .mysqli_error($conn);
            }
        }
        else{
            echo "File not get";
        }
    }
?>