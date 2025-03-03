<?php 
session_start();
if(!isset($_SESSION['schedule'])){
header("location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCHEDULE</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/event.css">

</head>
<body class="bg-dark">
    
<div class="container-fluid">
        <div class="text-center bg-light rounded">
            <h2 class="py-3 text-dark font-weight-bold">PROGRAMME SCHEDULE</h2>
        </div>

        <div class="row">
        <div class="col-lg-3 bg-dark px-0 rounded"id="col">
        <div class="bg-secondary">
                    <div class="row">
                        <div class="col-6">
                        <img src="<?php  echo($_SESSION['admin_pics']);?>" alt="scheduledate"id="img">
                        </div>
                        <div class="col-6">
                            <h3 class="text-center text-light  mt-3"><?php echo($_SESSION['name']);  ?></h3>
                        
                        </div>
                        
                    </div>

                    <form action="admin.php"method="POST">
            <div class="row">
                
            <button type="submit"name="add"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">ADD NEW MEMBERS</button>
            </div><!--End of button sidebar div--> 

            
            <div class="row">
                <button type="submit"name="event" class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">ADD EVENTS</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="schedule"class="btn btn-success btn-block font-weight-bold mt-2 py-3 text-light">SCHEDULES</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="admin_msg"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">MESSAGE MEMBERS</button>
            </div><!--End of button sidebar div-->
        
            <div class="row mt-2">

            <div class="col-6 px-0 ">
            <button type="submit"name="home"class="btn btn-primary btn-block">HOME</button>
            
        </div>
             
        
               <div class="col-6 px-0">
                   <button type="submit"name="logout"class="btn btn-danger btn-block">LOGOUT</button>
                   
               </div>
            
            </div><!--End of button sidebar div-->
            </form>

            <?php button();
     
        
     function button(){

         if(isset($_POST['add'])){
             $_SESSION['add']=$_POST['add'];
             header("location:addmember.php");
             }
             
          if(isset($_POST['event'])){
             $_SESSION['event']=$_POST['event'];
             header("location:event.php");
              }

         if(isset($_POST['schedule'])){
          $_SESSION['schedule']=$_POST['schedule'];
         header("location:schedule.php");
             }

             if(isset($_POST['admin_msg'])){
                 $_SESSION['admin_msg']=$_POST['admin_msg'];
                header("location:admin_msg.php");
                    }
                    if(isset($_POST['home'])){
                      
                       header("location:admin.php");
                           }

                            // logout
                       if(isset($_POST['logout'])){
                        unset( $_SESSION['add']);
                        unset( $_SESSION['event']);
                        unset( $_SESSION['schedule']);
                        unset( $_SESSION['admin_msg']);
                        unset( $_SESSION['name']);
                        unset( $_SESSION['alert']);
                        unset(  $_SESSION['admin_no']);
                        unset($_SESSION['admin_pics']);
                        
                    
                        

                       header("location:index.php");
                           }


         
 
                 
                 
         
     }// end of function
     ?>
                
                


                </div>


        </div><!-- End of col-3 div-->

        <div class="col-lg-9 mt-5 bg-light rounded">
        <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="bg-info text-center rounded">
                            <h2 class="text-light py-3">6 MONTHS SCHEDULES</h2>
                        </div>
                        <div>

                        <div class="card">
                            <img src="./images/real.jpg" alt="scheduledate"class="card-img py-3">
                        </div>
</div>
                       

        </div>
        </div><!--End of row div.-->

       
  

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>