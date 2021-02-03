<?php
    require_once 'conn.php';
    session_start();
    if(isset($_SESSION['name']))
    {
        header("location:profile.php");
    }

    if(isset($_REQUEST['register']))
    {
        if($_REQUEST['username'] != "" && $_REQUEST['password'] != "" && $_REQUEST['contactno'] != "" && $_REQUEST['address'] != ""){
            $filename = $_FILES["profilepic"]["name"]; 
            $tempname = $_FILES["profilepic"]["tmp_name"];     
            $folder = "images/".$filename; 
            if (move_uploaded_file($tempname, $folder))
            {
                $qry="insert into tblcustomer (username,password,profilepic,contactno,address) values('".$_REQUEST['username']."','".$_REQUEST['password']."','".$filename."','".$_REQUEST['contactno']."','".$_REQUEST['address']."')";
                if( $con->query($qry) === TRUE){
                    echo "<script>alert(' Register Successfully'); window.location='/oswd/EXAM/login.php';</script>";
                    //header("location:login.php");
                }else{
                    echo "<div align='center'> Error. </div>";
                }
            }else{
                echo "<div align='center'> File Not Uploaded. </div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <br/><br/>
    <div align="center"><a href="login.php">Login</a></div>
    <br/><br/>
    <div align="center">
        <form method="post" enctype="multipart/form-data">
            <table align="center" border="2">
                <tr>
                    <th colspan="2">Register Form</th>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <th>Profile Pic</th>
                    <td><input type="file" name="profilepic"></td>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <td><input type="number" name="contactno" maxlength="10"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="register" value="Register"></th>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>