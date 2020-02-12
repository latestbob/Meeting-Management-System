<?php
session_start();
require_once("db.php");
?>
<?php

// for members login

$_SESSION['error']="";
$_SESSION['bg']="";


if(isset($_POST['member_login'])){
if(empty($_POST['uname'])|| empty($_POST['pass'])){
    $_SESSION['error']="ENTER FIELDS TO LOGIN";
    
    header("location:member_login.php");
}
else{
    $user=$_POST['uname'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM members WHERE u_name='$user' AND password='$pass'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $_SESSION['member_name']= $row['full_name'];
            $_SESSION['member_uname']= $row['u_name'];
            $_SESSION['member_email']= $row['email'];
            $_SESSION['member_address']= $row['address'];
            $_SESSION['member_phone']= $row['phone'];
            $_SESSION['member_MembershipNo']= $row['MembershipNo'];
            $_SESSION['profile']=$row['Profile'];
            header("location:member_home.php");
        }
    }//end of ifrow
    else{
        header("location:member_login.php");
    }
    
}







}//end of main if
else{
    header("location:member_login.php");
}
?>