<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div align="center">
        <div style="padding-left:300px"><a href="logout.php">Logout</a></div>
        <br/><br/>
        <img src="images/<?= $_SESSION['profilepic'] ?>" height="300" width="300" alt="">
        <div > Name : <?= $_SESSION['name'] ?> </div>
        <div > Contact No : <?= $_SESSION['contactno'] ?> </div>
        <div > Address : <?= $_SESSION['address'] ?> </div>
    </div>
</body>
</html>