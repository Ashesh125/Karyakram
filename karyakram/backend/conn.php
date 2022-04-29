<?php
    $host="localhost";
    $username="id18828533_wethree";
    $password="P@ssword1234";
    $database="id18828533_primary";

    $conn = mysqli_connect($host,$username,$password,$database);
    if($conn -> error){
        echo"error";
    }
?>