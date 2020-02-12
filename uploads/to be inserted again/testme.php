<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <form action="testme.php"method="POST">
        <label>Username</label>
        <input type="text"name="username"placeholder="username">
        <br>
        <label>Password</label>
        <input type="password"name="pass"placeholder="password">
        <br>
        <button type="submit"name="login">Login</button>
    </form>

    <?php
    // create database connectioni

    $conn=mysqli_connect('localhost','root','','form');

    if(!$conn){
        die('Database connection error'.mysqli_error());
    }
        
        if(isset($_POST['login'])){


            $name=$_POST['username'];
             $pass=$_POST['pass'];

             
        $sql="SELECT * FROM user WHERE user='$name' AND pass='$pass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
           
            echo('<br>');

            $_SESSION['name']=$row['user'];
            header("location:testlog.php");
            
            

           
            
            
        }
    }
    else{
        
        echo('record not found');
        
    }
             
        }
       


    ?>
</body>
</html>