<?php
session_start();
require_once("db.php");
$admin_id="";
$_SESSION['text']="";

if(!isset($_SESSION['admin_msg'])){
    header("location:admin.php");
    
}


?>
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
                <button type="submit"name="schedule"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">SCHEDULES</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="admin_msg"class="btn btn-success btn-block font-weight-bold mt-2 py-3 text-light">MESSAGE MEMBERS</button>
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
                            <h2 class="text-light py-3">MESSAGE MEMBER</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 m-auto">

                            <form action="admin_msg.php"method="POST">
                                <div class="form-group">
                                    <p class="text-center">DATE:
                                    <input type="date"name="msg_date"class="form-control"></p>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">SUBJECT:
                                    <input type="text"name="msg_subject"placeholder="SUBJECT"class="form-control"></p>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">MESSAGE BODY:
                                    <input type="text"name="msg_body"class="form-control"id="events"></p>
                                </div>
                                
                                <?php

                                    $sql="SELECT * FROM members";
                                    $result=mysqli_query($conn,$sql);


                                ?>

                                <div class="form-group">
                                    <p class="text-center">SELECT MEMBER:
                                    <select name="select_member"class="form-control">
                                   
                                    <?php
                                        while($row=mysqli_fetch_assoc($result)):
                                            ?>
                                            <option value="<?php echo $row['full_name'];?>"><?php echo $row['full_name'].'<p class="pl=3">  CHOOSE ID:  '.$row['MembershipNo'].'</p>';?></option>
                                        <?php endwhile;?>
                                    </select>
                                </p>
                                </div>
                                <?php

                                $sql4="SELECT * FROM members";
                                $result=mysqli_query($conn,$sql4);


                                ?>

                                <div class="form-group">
                                    <p class="text-center"> MEMBER ID:
                                    <select name="Member_id"class="form-control">
                                   
                                    <?php
                                        while($row1=mysqli_fetch_assoc($result)):
                                            ?>
                                            <option value="<?php echo $row1['MembershipNo'];?>"><?php echo $row1['MembershipNo'];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </p>
                                
                                </div>
                                <div class="form-group">
                                    <button type="submit"name="send_msg"class="btn btn-success">SEND MESSAGE</button>
                                </div>

                                <?php
                                    if(isset($_POST['send_msg'])){
                                        if(empty($_POST['msg_date'])){
                                            $_SESSION['text']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';
                                        }
                                        elseif(empty($_POST['msg_subject'])){
                                            $_SESSION['text']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';
                                        }
                                        elseif(empty($_POST['msg_body'])){
                                            $_SESSION['text']='<div class="alert alert-danger text-center">FILL FIELDS CORRECTLY</div>';
                                        }
                                        else{
                                            $date=$_POST['msg_date'];
                                            $subject=$_POST['msg_subject'];
                                            $body=$_POST['msg_body'];
                                            $Recipient=$_POST['select_member'];
                                            $Meno=$_POST['Member_id'];

                                            $sql5="INSERT INTO messages(Date,Subject,Body,Receiver,Sender,MembershipNo)VALUES('$date','$subject','$body','$Recipient','$_SESSION[name]','$Meno')";
                                            if(mysqli_query($conn,$sql5)){
                                                $_SESSION['text']='<div class="alert alert-success"> MESSAGE SENT</div>';
                                            }
                                            
                                        }

                                    }//main if

                                

                                ?>

                            </form>
                            <?php
                                echo($_SESSION['text']);
                            ?>
                       
                        
                        </col-6>
                        </div>
                        
              
                            
                        
 
                       

        </div>
        
        </div><!--End of row div.-->
        <div class="col-lg-9 bg-success text-center m-auto rounded">
                        <h3 class="text-center text-light py-2">RECEIVED MESSAGE</h3>

                        </div>

                        <?php
                        $admin_id=$_SESSION['admin_no'];
                        $sql6="SELECT * FROM admin_message WHERE Admin_id=$admin_id";
                        $result=mysqli_query($conn,$sql6);
                        
                        while($row=mysqli_fetch_assoc($result)):
                            ?>
                            <div class="col-lg-9 m-auto text-center bg-light">
<p class="text-success bg-light text-success font-weight-bold"><?php echo($row['Date'].  '<br>'.$row['Subject']. '<br>'.$row['Body'].'<br>'.$row['Sender']);?>
<?php echo('<br>');?>
<a href="admin_msg.php?cancel=<?php echo($row['id']);?>"class="btn btn-danger">DELETE</a>
<hr>
</p>
</div>

<?php endwhile;?>
<?php 
    if(isset($_GET['cancel'])){
        $id=$_GET['cancel'];

        $sql33="DELETE FROM admin_message WHERE id=$id";
        $check=mysqli_query($conn,$sql33);
    }

?>

                       

       

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>