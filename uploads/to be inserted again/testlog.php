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
    <h1>You are login in </h1>
    <?php echo($_SESSION['name']);?>

        <form action="testlog.php"method="POST">
        <button type="submit"name="logout">Logout</button>
        </form>
  
    <?php
        if(isset($_POST['logout'])){
            session_destroy();
            header("location:testme.php");


        }
    ?>


</body>
</html>