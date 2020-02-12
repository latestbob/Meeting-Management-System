<?php
session_start();
require_once("db.php");
if(!isset($_SESSION['member_name'])){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Home</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">

 <link rel="stylesheet"href="./css/home.css">

</head>
<body>
  <div class="container-fluid">
    <div class="bg-dark text-center rounded">
        <h2 class="py-3 text-white font-weight-bold">WELCOME TO YOUR PROFILE</h2>
    </div><!-- HEADING DIV CLOSURE-->

    
    <div class="row"><!--Row of Grid System-->
        <!--3 colum span-->

        
            <div class="col-lg-3 bg-success mb-4 rounded px-0"id="short">
                <div id="myrow">
                    <div class="row">
                        <div class="col-6">
                        <img src="<?php echo($_SESSION['profile']);?>" alt="profile"id="img1">
                        </div>
                        <div class="col-6">
                            <h3 class="text-center text-light  mt-3"><?php echo($_SESSION['member_uname']);  ?></h3>
                        
                        </div>
                        
                    </div>
                    <form action="member_home.php"method="POST">
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
                <button type="submit"name="member_msg1"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-dark">MESSAGE ADMINS</button>
            </div><!--End of button sidebar div-->
        
            <div class="row mb-2">
            
             
        
               <div class="col-6 px-0 m-auto">
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
                       // logout
                       if(isset($_POST['logout1'])){
                        unset( $_SESSION['event1']);
                        unset( $_SESSION['schedule1']);
                        unset( $_SESSION['profile1']);
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

            <div class="col-lg-9 mt-5 bg-light rounded"id="long">
                <div class="row">
                    <div class="col-lg-m-auto">
                        <div class="bg-success text-center rounded">
                            <h2 class="text-light py-3 ">MEMBER PROFILE CARD</h2>
                            </div>

                            <div class="card col-lg-9 m-auto text-justify-center">

                            <div class="card-head">
                            <img class="card-img text-center"src="<?php echo($_SESSION['profile']);?>" alt="profile"id="card">
                            </div>
                            <div class="card-body">
                                <h3 class="text-center font-weight-bold text-light bg-success d-block p-1 rounded mb-4"><?php echo($_SESSION['member_name'])  ;?></h3>

                                <table class="table-responsive">
                                <tbody>
                                <tr class="text-secondary font-weight-bold py-2">
                                
                                <td>Username:</td>
                                <td class="pl-5"><?php echo($_SESSION['member_uname']);  ?></td>
                                </tr>

                                <tr class="text-secondary font-weight-bold py-2">
                                <td class="py-2">E-mail:</td>
                                <td class="py-2 pl-5"><?php echo($_SESSION['member_email']);  ?></td>
                                </tr>

                                <tr class="text-secondary font-weight-bold py-2">
                                
                                <td class="py-2">Address:</td>
                                <td class="py-2 pl-5"><?php echo($_SESSION['member_address']);  ?></td>
                                </tr>

                                <tr class="text-secondary font-weight-bold py-2">
                                
                                <td class="py-2">Telephone:</td>
                                <td class="py-2 pl-5"><?php echo($_SESSION['member_phone']);  ?></td>
                                </tr>

                                <tr class="text-secondary font-weight-bold py-2">
                                
                                <td>MembershipNo:</td>
                                <td class="pl-5"><?php echo($_SESSION['member_MembershipNo']);  ?></td>
                                </tr>
                                
                                
                                
                                
                                </tbody>
                                
                                
                                </table>

                                
                            </div>

                            <p class="font-weight-bold text-success"id="marquee"><marquee id="marquee">WELCOME TO YOUR PROFILE PAGE</marquee></p>
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