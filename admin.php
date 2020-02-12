<?php
session_start();
require_once("db.php");
if(!isset($_SESSION['name'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/admin.css">

</head>
<body class="bg-dark">
    
    <div class="container-fluid">
        <div class=" bg-light text-center rounded">
            <h2 class="text-dark py-3 font-weight-bold">ADMIN DASHBOARD</h2>
        </div>
           
        <div class="row"><!--Row of Grid System-->
        <!--3 colum span-->
            <div class="col-lg-3 bg-dark rounded px-0"id="white">
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
                <button type="submit"name="event" class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">ADD EVENTS</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="schedule"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">SCHEDULES</button>
            </div><!--End of button sidebar div-->

            
            <div class="row">
                <button type="submit"name="admin_msg"class="btn btn-dark btn-block font-weight-bold mt-2 py-3 text-light">MESSAGE MEMBERS</button>
            </div><!--End of button sidebar div-->
        
            <div class="row mt-2">
            
             
        
               <div class="col-6 px-0 m-auto">
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
                    <!--End of button sidebar div-->
                </div>
            </div>
        <!--9 column span-->

            <div class="col-lg-9 bg-light rounded mt-5"id="light">
                <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="bg-info text-center rounded">
                            <h2 class="text-light py-3">REGISTERED MEMEBERS</h2>
                        </div>
                        <?php

                        $sql="SELECT * FROM members";
                        $result=mysqli_query($conn,$sql);
                        



                        ?>
                        <div class="table-responsive">
                        <table class="table bg-dark text-light">
                            <thead>
                                <tr>
                                    <th class="text-center">NAMES</th>
                                    
                                    <th class="text-center">PHONE NO</th>
                                    <th class="text-center">MEMBERNO</th>
                                    <th class="text-center">E-MAIL</th>
                                    <th class="text-right">PROFILE</th>
                                    <th class="text-right">DELETE</th>

                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row=mysqli_fetch_assoc($result)):
                            ?>
                            <tr>
                            <td class="text-center"><?php echo($row['full_name']); ?></td>
                            <td class="text-center"><?php echo($row['phone']); ?></td>
                            <td class="text-center"><?php echo($row['MembershipNo']); ?></td>
                            <td class="text-center"><?php echo($row['email']); ?></td>
                            <td class="text-right"><img src="<?php echo($row['Profile']); ?>" alt="Profile_pics"id="profile"></td>
                            <td class="text-center"><a href="admin.php?delete=<?php echo($row['MembershipNo']);?>"class="btn btn-danger">DELETE</a></td>
                            
                            </tr>

                            <?php endwhile;?>

                            </tbody>

                        </table>
                        </div>
                        <?php
                        if(isset($_GET['delete'])){
                            $meno=$_GET['delete'];
                            $sql10="DELETE FROM members WHERE MembershipNo=$meno";
                           // $sql11="DELETE FROM messages WHERE MembershipNo=$meno";

                            if(mysqli_query($conn,$sql10)){
                                $sql11="DELETE FROM messages WHERE MembershipNo=$meno";
                                
                                $result=mysqli_query($conn,$sql11);
                            }
                           

                            
                        }
                        ?>

                       
                    
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     

  

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>