<?php
session_start();
require_once("db.php");
?>
<?php

$_SESSION['error']="";
$_SESSION['bg']="";


if(isset($_POST['admin_login'])){
if(empty($_POST['uname'])|| empty($_POST['pass'])){
    $_SESSION['error']="ENTER FIELDS TO LOGIN";
    
    header("location:index.php");
}
else{
    $user=$_POST['uname'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM admin_login WHERE user='$user' AND pass='$pass'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $_SESSION['name']= $user=$_POST['uname'];
            $_SESSION['admin_no']=$row['id'];
            $_SESSION['admin_pics']=$row['Profile'];

            header("location:admin.php");
        }
    }//end of ifrow
    else{
        header("location:index.php");
    }
    
}








}//end of main if
else{
    header("location:index.php");
}
?>


