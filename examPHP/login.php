<?php
    require_once 'conn.php';
    session_start();
    if(isset($_SESSION['name']))
    {
        header("location:profile.php");
    }

    if(isset($_REQUEST['login']))
    {
        if($_REQUEST['username'] != "" && $_REQUEST['password'] != "")
        {
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
            $sql="select * from tblcustomer where username='".$username."' and password='".$password."';";
            $dt=$con->query($sql);
            if(mysqli_num_rows($dt)>0){
                $dt=$dt->fetch_assoc();
                $_SESSION['name']=$dt['username'];
                $_SESSION['profilepic']=$dt['profilepic'];
                $_SESSION['contactno']=$dt['contactno'];
                $_SESSION['address']=$dt['address'];
                header("location:profile.php");
            }
            else{
                echo "<div align='center' style='color:red'>Invalid Username & Password</div>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <br/><br/>
    <div align="center">
        <form method="post">
            <table align="center" border="2">
                <tr>
                    <th colspan="2">Login Form</th>
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
                    <th colspan="2"><input type="submit" name="login" value="Login"></th>
                </tr>
            </table>
        </form>
    </div>
    <br/><br/>
    <div align="center"><a href="register.php">Register</a></div>
</body>
</html>