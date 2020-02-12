<?php 
session_start();


require_once("db.php");
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
    <title>Add Event</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/event.css">

</head>
<body class="bg-dark">
    
<div class="container-fluid">
        <div class="text-center bg-light rounded">
            <h2 class="py-3 text-dark font-weight-bold">ADD EVENTS</h2>
        </div>

        <div class="row">
        <div class="col-lg-3 bg-dark px-0 rounded"id="col">
        <div class="bg-secondary">
                    <div class="row">
                        <div class="col-6">
                        <img src="<?php  echo($_SESSION['admin_pics']);?>" alt="profile"id="img">
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
                <button type="submit"name="event" class="btn btn-success btn-block font-weight-bold mt-2 py-3 text-light">ADD EVENTS</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="schedule"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">SCHEDULES</button>
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
                            <h2 class="text-light py-3">NEW EVENTS</h2>
                        </div>

                        <div class="row">
                        
                            
                            <div class="col-lg-6">
                                <h4 class=" font-weight-bold text-center">FROM:  ADMIN</h4>
                            </div>

                            <div class="col-lg-6">
                                <h4 class=" font-weight-bold text-center">TO : ALL MEMEBERS</h4>
                            </div>

                            <div class="col-lg-6 m-auto ">
                            <form action="event.php"method="POST">

                                <div class="form-group mt-3">
                                    <p class="text-center font-weight-bold bg-success d-block rounded text-light pt-3">EVENTS
                                        <input type="text"name="ename"placeholder="     Enter Events Here"  class="form-control"id="events">
                                    </p>
                                </div>



                                    <div class="form-group">
                                    <p class="text-center font-weight-bold bg-success d-block rounded text-light pt-3">DATE/TIME SCHEDULED
                                        <input type="date"name="etime"class="form-control">
                                    </p>
                                </div>

                                <div class="form-group">
                                    <button type="submit"name="myevent"class="btn btn-success">ADD EVENT</button>
                                </div>
                                <?php
           
        
           $_SESSION['event_alert']="";
        if(isset($_POST['myevent'])){
            if(empty($_POST['ename'])){
                $_SESSION['event_alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';
            }
            elseif(empty($_POST['etime'])){
                $_SESSION['event_alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';
            }

            else{
                $ename=$_POST['ename'];
                $etime=$_POST['etime'];
                $sql="INSERT INTO events(event,time)VALUES('$ename','$etime')";

                if(mysqli_query($conn,$sql)){
                    $_SESSION['event_alert']='<div class="alert alert-success text-center">EVENTS ADDED SUCCESSFULLY</div>';
                }
                else{
                    $_SESSION['event_alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';
                }
            }// end of else


        }//end of main if

        ?>
                            </form>
                            <?php  echo($_SESSION['event_alert']);?>
                            </div>
                            
                        </div>

        </div>
        </div><!--End of row div.-->

      
        
       

        <div class="bg-success text-center col-lg-9 m-auto rounded">
        <h4 class="p-2 text-light">RECENT EVENTS</h4>
        </div>

        <div class="bg-light text-center col-lg-9 m-auto rounded">
        <?php
        $sql="SELECT * FROM events ORDER BY id DESC LIMIT 3";
$result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_assoc($result)):




?>
<p class="text-success bg-light font-weight-bold"><?php echo($row['event'].  '<br>'.$row['time']);?>
<?php echo('<br>');?>
<a href="event.php?delete_event=<?php echo($row['id']);?>"class="btn btn-danger">DELETE</a>
<hr>
</p>

<?php endwhile;?>

<?php 
    if(isset($_GET['delete_event'])){
        $id=$_GET['delete_event'];

        $sql33="DELETE FROM events WHERE id=$id";
        $check=mysqli_query($conn,$sql33);
    }

?>
        </div>
       

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>