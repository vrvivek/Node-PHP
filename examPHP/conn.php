<?php
    $con=new mysqli('localhost','root','root','test1');
    if ($con->connect_error) {
        echo "Failed to connect to MySQL: " . $con->connect_error;
        exit();
    }
?>