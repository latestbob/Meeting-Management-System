<?php 
session_start();
if(!isset($_SESSION['event'])){
header("location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EVENT</title>
</head>
<body>

<form action="admin.php"method="POST">

<button type="submit"name="add">Add Member</button>
<button type="submit"name="event">Event</button>
<button type="submit"name="message">Message Member</button>
<button type="submit"name="schedule">Schedule</button>
<button type="submit"name="Home">Home</button>





</form>
    

<?php
button();

function button(){
If(isset($_POST['add'])){
$_SESSION['add']=$_POST['add'];
header ("location:addmember.php");
}


if(isset($_POST['event'])){
$_SESSION['event']=$_POST['event'];
header("location:event.php");
}

if(isset($_POST['schedule'])){
$_SESSION['schedule']=$_POST['schedule'];
header ("location:schedule.php");
}

if(isset($_POST['message'])){
$_SESSION['message']=$_POST['message'];
header("location:message.php");
}

if(isset($_POST['home'])){
  
    header("location:message.php");
    }
}// end of function
?>



</body>
</html>