

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MESSAGE MEMEBERS</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/event.css">

</head>
<body class="bg-dark">
    
<div class="container-fluid">
        <div class="text-center bg-light rounded">
            <h2 class="py-3 text-dark font-weight-bold">MESSAGE REGISTERED MEMBERS</h2>
        </div>

        <div class="row">
        <div class="col-md-3 bg-dark px-0 rounded"id="col">
        <div class="bg-secondary">
                    <div class="row">
                        <div class="col-6">
                        <img src="./images/profile2.jpg" alt="scheduledate"id="img">
                        </div>
                        <div class="col-6">
                            <h3 class="text-center text-light  mt-3">BOBSON</h3>
                        
                        </div>
                        
                    </div>
                    <?php
                        col3();
                    ?>
                
                </div>


        </div><!-- End of col-3 div-->

        <div class="col-md-9 bg-light rounded">
        <div class="row">
                    <div class="col-9 m-auto">
                        <div class="bg-info text-center rounded">
                            <h2 class="text-light py-3">MESSAGE MEMBER</h2>
                        </div>

                        <div class="row">
                            <div class="col-6 m-auto">

                            <form action="#"method="POST">
                                <div class="form-group">
                                    <p class="text-center">DATE:
                                    <input type="date"name="msg_date"class="form-control"></p>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">SUBJECT:
                                    <input type="text"name="msg_subject"class="form-control"></p>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">MESSAGE BODY:
                                    <input type="text"name="msg_body"class="form-control"id="events"></p>
                                </div>

                                <div class="form-group">
                                    <p class="text-center">SELECT MEMBER:
                                    <select name="select_member"class="form-control">
                                        <option value="FIRST MEMBER">FIRST MEMBER</option>
                                        <option value="SECOND MEMBER">SECOND MEMBER</option>
                                        <option value="THIRD MEMBER">THIRD MEMBER</option>

                                    </select>
                                </p>
                                </div>
                                <div class="form-group">
                                    <button type="submit"name="send_msg"class="btn btn-success">SEND MESSAGE</button>
                                </div>
                                
                            </form>
                        
                        </col-6>
                        </div>
 
                       

        </div>
        </div><!--End of row div.-->

        <?php
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
                <button class="btn btn-success btn-block font-weight-bold mt-2 py-3 text-light">MESSAGE MEMBERS</button>
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