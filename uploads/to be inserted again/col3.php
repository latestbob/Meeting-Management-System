<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<?php


col3();


function col3(){

    echo('
    <a href="addmember.php"class="text-decoration-none">
    <div class="row">
        
    <button class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">ADD NEW MEMBERS</button>
    </div><!--End of button sidebar div--> </a>
    <a href="event.php"class="text-decoration-none">
    <div class="row">
        <button class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">ADD EVENTS</button>
    </div><!--End of button sidebar div--></a>
    <a href="schedule.php"class="text-decoration-none">
    <div class="row">
        <button class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">SCHEDULES</button>
    </div><!--End of button sidebar div--></a>
    <a href="admin_msg.php"class="text-decoration-none">
    <div class="row">
        <button class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">MESSAGE MEMBERS</button>
    </div><!--End of button sidebar div--></a>

    <div class="row mt-2">
    
       <div class="col-6 px-0">
       <a href="admin.php"class="text-decoration-none">
           <button class="btn btn-info btn-block">HOME</button>
</a></div>

       <div class="col-6 px-0">
           <button class="btn btn-danger btn-block">LOGOUT</button>
       </div>
    
    </div><!--End of button sidebar div-->
    ');
}

?>

<script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>

