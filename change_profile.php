<?php
session_start();
$_SESSION['display']="";
require_once("db.php");
$you="";
if(!isset($_SESSION['profile1'])){
    header("location:member_home.php");
    }
    $profile="";
  
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Change Profile</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">

 <link rel="stylesheet"href="./css/home.css">

</head>
<body>
  <div class="container-fluid">
    <div class="bg-dark text-center rounded">
        <h2 class="py-3 text-white font-weight-bold">CHANGE PROFILE DETAILS</h2>
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
                    <form action="change_profile.php"method="POST">
            <div class="row">
                
            <button type="submit"name="event1"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">EVENTS</button>
            </div><!--End of button sidebar div--> 

            
            <div class="row">
                <button type="submit"name="schedule1" class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">SCHEDULES</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="profile1"class="btn btn-light btn-block font-weight-bold mt-2 py-3 text-dark">CHANGE PROFILE</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="member_msg1"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">MESSAGE ADMINS</button>
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

        <?php
            if(isset($_POST['update'])){
                if(empty($_FILES['profile_image'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';
                }
                elseif(empty($_POST['u_name'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['password'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['email'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['address'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['phone'])){
                    $_SESSION['display']='<div class="alert alert-danger text-cent">FILL FIELDS CORRECTLY</div>';

                }
                else{
                    $files=$_FILES['profile_image'];
                    //print_r($files);

                    $image_name=$files['name'];
                    $image_error=$files['error'];
                    $image_tmp=$files['tmp_name'];

                    $image_ext=explode('.',$image_name);
                    $image_check=strtolower(end($image_ext));
                    $image_ext_store=array('png', 'jpg', 'jpeg');
                    if(in_array($image_check,$image_ext_store)){

                     $image_destination='uploads/'.$image_name;
                     move_uploaded_file($image_tmp,$image_destination);
                    }
                    $username=$_POST['u_name'];
                    $password=$_POST['password'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    $profile=$_FILES['profile_image'];
                    $you=$_SESSION['member_MembershipNo'];

                    $sql="UPDATE members SET u_name='$username',password='$password',email='$email',address='$address',phone='$phone',Profile='$image_destination' WHERE MembershipNo=$you";
                    $result=mysqli_query($conn,$sql);
                    $_SESSION['display']='<div class="alert alert-success text-cent">UPDATED</div>';

                }
            }// end of main if
        ?>

            <div class="col-lg-9 bg-light rounded"id="long">
                <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="bg-success text-center rounded">
                            <h2 class="text-light py-3">UPDATE PROFILE</h2>
                           
                            <div class="card">

                            <div class="card-header">
                          
                            <form action="change_profile.php"method="POST"enctype="multipart/form-data"class="justify-content-center">
                                    <div class="form-group justify-content-center">
                                <input type="file"name="profile_image"class="pl-4 bg-info py-2 text-light">
                                </div>
                                <?php  echo($_SESSION['display']);?>
                            
                            </div>
                            <div class="card-body">
                                
                            <div class="col-lg-8 m-auto">
                            
                            <div class="form-group">
                                <input 

type="text"name="u_name"Placeholder="USERNAME"class="form-control">
                            </div>
                            <div class="form-group">
                                <input 

type="password"name="password"Placeholder="PASSWORD"class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="email"name="email"Placeholder="E-

MAIL"class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="text-

area"name="address"Placeholder="ADDRESS"class="form-control">
                            </div>

                            <div class="form-group">
                                <input 

type="tel"name="phone"Placeholder="PHONE NO"class="form-control">
                            </div>

                            

                            <div class="form-group">
                                <button type="submit"name="update"class="btn btn-lg 

btn-success py-1 my-0">UPDATE</button>
                            </div>
                            </div>
                            </form>
             
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