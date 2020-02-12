<?php
session_start();
$you="";
$_SESSION['notice']="";
require_once("db.php");
if(!isset($_SESSION['member_msg1'])){
    header("location:member_home.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Message</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">

 <link rel="stylesheet"href="./css/home.css">

</head>
<body>
  <div class="container-fluid">
    <div class="bg-dark text-center rounded">
        <h2 class="py-3 text-white font-weight-bold">SEND AND RECEIVE FROM ADMINS</h2>
    </div><!-- HEADING DIV CLOSURE-->

        
    <div class="row"><!--Row of Grid System-->
        <!--3 colum span-->
            <div class="col-lg-3 bg-success rounded px-0"id="short">
                <div id="myrow">
                    <div class="row">
                        <div class="col-6">
                        <img src="<?php echo($_SESSION['profile']);?>" alt="profile"id="img">
                        </div>
                        <div class="col-6">
                            <h3 class="text-center text-light  mt-3"><?php echo($_SESSION['member_uname']);  ?></h3>
                        
                        </div>
                        
                    </div>
                    <form action="member_message.php"method="POST">
            <div class="row">
                
            <button type="submit"name="event1"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">EVENTS</button>
            </div><!--End of button sidebar div--> 

            
            <div class="row">
                <button type="submit"name="schedule1" class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">SCHEDULES</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="profile1"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">CHANGE PROFILE</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="member_msg1"class="btn btn-light btn-block font-weight-bold mt-2 py-3 text-dark">MESSAGE ADMINS</button>
            </div><!--End of button sidebar div-->
        
            <div class="row mt-2">
            
             
        
            <div class="col-6 px-0 ">
            <button type="submit"name="home1"class="btn btn-primary btn-block">HOME</button>
            
        </div>
             
        
               <div class="col-6 px-0">
                   <button type="submit"name="logout1"class="btn btn-danger btn-block">LOGOUT</button>
                   
               </div>
            
            </div><!--End of button sidebar div-->
            </form>

            <?php button();
     
        
     function button(){

         if(isset($_POST['event1'])){
             $_SESSION['event1']=$_POST['event1'];
             header("location:member_event.php");
             }
             
          if(isset($_POST['schedule1'])){
             $_SESSION['schedule1']=$_POST['schedule1'];
             header("location:member_schedule.php");
              }

         if(isset($_POST['profile1'])){
          $_SESSION['profile1']=$_POST['profile1'];
         header("location:change_profile.php");
             }

             if(isset($_POST['member_msg1'])){
                 $_SESSION['member_msg1']=$_POST['member_msg1'];
                header("location:member_message.php");
                    }

                    if(isset($_POST['home1'])){
                        $_SESSION['home1']=$_POST['home1'];
                       header("location:member_home.php");
                           }
                    // logout
                    if(isset($_POST['logout1'])){
                     unset( $_SESSION['event1']);
                     unset( $_SESSION['schedule1']);
                     unset( $_SESSION['profile1']);
                     unset( $_SESSION['home1']);
                     unset( $_SESSION['member_msg1']);
                     unset( $_SESSION['member_name']);
                     unset( $_SESSION['member_uname']);
                     unset( $_SESSION['member_email']);
                     unset( $_SESSION['member_address']);
                     unset( $_SESSION['member_phone']);
                     unset( $_SESSION['member_MembershipNo']);
                     unset( $_SESSION['profile']);
                     
                     
                     
                     
                     

                    header("location:member_login.php");
                        }

         
 
                 
                 
         
     }// end of function
     ?>

                    <!--End of button sidebar div-->
                </div>
            </div>
        <!--9 column span-->

            <div class="col-lg-9 bg-light rounded"id="long">
                <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="bg-success text-center rounded">
                            <h2 class="text-light py-3">MESSAGE ADMIN</h2>
                           
                            <div class="card">

                            
                            <form action="member_message.php"method="POST"class="justify-content-center">
                             
                            <div class="card-body">
                                
                            <div class="col-lg-8 m-auto">

                            <?php
                            if(isset($_POST['msg_admin'])){
                                if(empty($_POST['date'])){
                                    $_SESSION['notice']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';

                                }
                                elseif(empty($_POST['subject'])){
                                    $_SESSION['notice']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';
                                }
                                elseif(empty($_POST['message'])){
                                    $_SESSION['notice']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';
                                }

                                else{
                                    $date=$_POST['date'];
                                    $subject=$_POST['subject'];
                                    $message=$_POST['message'];
                                    $admin_no=$_POST['select_admin'];
                                    
                                    $sql5="INSERT INTO admin_message(Date,Subject,Body,Sender,Admin_id,SenderId)VALUES('$date','$subject','$message','$_SESSION[member_uname]','$admin_no','$_SESSION[member_MembershipNo]')";
                                    if(mysqli_query($conn,$sql5)){
                                    $_SESSION['notice']='<div class="alert alert-success text-center">MESSAGE SENT TO ADMIN</div>';
                                    }
                                }
                            }// end of main if

                            ?>
                            
                            <div class="form-group">
                                <input 

type="date"name="date"class="form-control">
                            </div>
                            <div class="form-group">
                                <input 

type="text"name="subject"Placeholder="SUBJECT"class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text"name="message"Placeholder="MESSAGE"class="form-control"id="events">
                            </div>

                            <?php

$sql="SELECT * FROM admin_login";
$result=mysqli_query($conn,$sql);


?>

<div class="form-group">
<p class="text-center">SELECT ADMIN:
<select name="select_admin"class="form-control">

<?php
    while($row=mysqli_fetch_assoc($result)):
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['user'];?></option>
    <?php endwhile;?>
</select>
</p>
</div>



                            <div class="form-group">
                                <button type="submit"name="msg_admin"class="btn btn-lg 

btn-success py-1 my-0">SEND MESSAGE</button>
                            </div>
                            </div>
                            </form>
                            <?php echo ($_SESSION['notice']);?>
                            </div>

                            <div class="bg-success justify-content-center rounded">
                                <h3 class="text-light py-2">RECEIVED MESSAGES</h3>
                             

                                <?php
                                $you=$_SESSION['member_MembershipNo'];
                             
                              $msg="SELECT * FROM messages WHERE MembershipNo=$you ORDER BY id DESC LIMIT 5";
                              $result=mysqli_query($conn,$msg);


                              while($row=mysqli_fetch_assoc($result)):
                              ?>
  <p class="text-success bg-dark text-light font-weight-bold"><?php echo($row['Date'].  '<br>'.$row['Subject']. '<br>'.$row['Body'].'<br>'.$row['Sender']);?>
  <?php echo('<br>');?>
  <a href="member_message.php?delete_msg=<?php echo($row['id']);?>"class="btn btn-danger">DELETE</a>
  <hr>
  </p>
  
  <?php endwhile;?>
  <?php 
    if(isset($_GET['delete_msg'])){
        $id=$_GET['delete_msg'];

        $sql33="DELETE FROM messages WHERE id=$id";
        $check=mysqli_query($conn,$sql33);
    }

?>
                                       
        
    
                               
                              
                                
                                  
           

                            
                            </div>
                            </div>
                            </div>

                            
                </div>
            </div>
        </div>




    <!-- main container closure-->
   
      
  

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>