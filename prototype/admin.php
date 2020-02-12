<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>

<form action="admin.php"method="POST">
<br>
<button type="submit"name="add">Add Member</button>
<br>
<br>
<button type="submit"name="event">Add Event</button>
<br>
<br>
<button type="submit"name="schedule">Schedule</button>
<br>
<br>
<button type="submit"name="message">Message Member</button>
<br>
<br>
<button type="submit"name="logout">Logout</button>
<br>



    </form>

    
<?php
button();

function button(){
if(isset($_POST['add'])){
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

if(isset($_POST['logout'])){
    unset($_SESSION['add']);
    unset($_SESSION['event']);
    unset($_SESSION['schedule']);
    unset($_SESSION['message']);

    header("location:logout.php");
    }


}// end of function
?>

    
</body>
</html>