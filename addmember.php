
<?php 
session_start();
require_once("db.php");



if(!isset($_SESSION['add'])){
header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Members</title>
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/addmember.css">

</head>
<body class="bg-dark">
    
<div class="container-fluid">
        <div class="text-center bg-light rounded">
            <h2 class="py-3 text-dark font-weight-bold">ADD NEW MEMEBERS</h2>
        </div>

       

        <div class="row">
        <div class="col-lg-3 bg-dark px-0 rounded"id="three">
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
                
            <button type="submit"name="add"class="btn btn-success btn-block font-weight-bold mt-2 py-3 text-light">ADD NEW MEMBERS</button>
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
        
            <div class="row mt-2 pb-5">

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
                        unset($_SESSION['MembershipNo']);
                        unset(  $_SESSION['admin_no']);
                        unset($_SESSION['admin_pics']);
                        

                       header("location:index.php");
                           }

           


         
 
                 
                 
         
     }// end of function
     ?>
                    

                <?php $_SESSION['alert']="";
                if(!isset($_SESSION['alert'])){
                    $_SESSION['alert']="";
                }
                ?>
                <?php
                if(isset($_POST['register'])){
                    /* if(empty($_POST['full_name'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                   
                    elseif(empty($_POST['u_name'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    elseif(empty($_POST['password'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    elseif(empty($_POST['email'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    elseif(empty($_POST['address'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    elseif(empty($_POST['phone'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    elseif(empty($_POST['dob'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }

                    elseif(empty($_POST['meno'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    */
                   if(empty($_FILES['image'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">CHOOSE A PROFILE IMAGE</div>';
                   }

                   elseif(empty($_POST['full_name'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['u_name'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['password'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['email'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['address'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['phone'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                elseif(empty($_POST['dob'])){
                    $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                }
                  elseif(empty($_POST['meno'])){
                        $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS CORRECTLY</div>';

                    }
                    /*
                      $meno=$_POST['meno'];
                        $q="SELECT * FROM members WHERE MembershipNo=$meno";
                        $result=mysqli_query($conn,$q);
                        if(mysqli_num_rows($result)>0){
                            $_SESSION['alert']='<div class="alert alert-danger text-center">FILL ALL FIELDS COREC</div>';
                        }
                        */



                   else{
                    $files=$_FILES['image'];
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

                    $full_name=$_POST['full_name'];
                    $u_name=$_POST['u_name'];
                    $password=$_POST['password'];
                     $email=$_POST['email'];
                      $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    $dob=$_POST['dob'];
                    $meno=$_POST['meno'];

                    // add image variable also
                    $sql="INSERT INTO members(full_name,u_name,password,email,address,phone,dob,MembershipNo,Profile)VALUES('$full_name','$u_name','$password','$email','$address','$phone','$dob','$meno','$image_destination')";        
                            if(mysqli_query($conn,$sql)){
                                
                                $_SESSION['alert']='<div class="alert alert-success text-center">MEMBER ADDED SUCCESSFULLY</div>';
                            }
                            else{
                                $_SESSION['alert']='<div class="alert alert-danger text-center">RECORD NOT INSERTED</div>';
                            }
                   }

                    
                        /*
                        $meno=$_POST['meno'];
                        $q="SELECT * FROM members WHERE MembershipNo=$meno";
                        $result=mysqli_query($conn,$q);
                        if(mysqli_num_rows($result)>0){
                            $_SESSION['alert']='<div class="alert alert-danger text-center">MEMBERSHIP NO TAKEN</div>';
                        }
                      */

                    

                    
                     /*
                    else{
                        $full_name=$_POST['full_name'];
                        $u_name=$_POST['u_name'];
                        $password=$_POST['password'];
                         $email=$_POST['email'];
                          $address=$_POST['address'];
                        $phone=$_POST['phone'];
                        $dob=$_POST['dob'];
                        $meno=$_POST['meno'];
                        */

                        //image upload
                        

                        /*
                        $sql="INSERT INTO members(full_name,u_name,password,email,address,phone,dob,MembershipNo)VALUES('$full_name','$u_name','$password','$email','$address','$phone','$dob','$meno')";        
                            if(mysqli_query($conn,$sql)){
                                
                                $_SESSION['alert']='<div class="alert alert-success text-center">MEMBER ADDED SUCCESSFULLY</div>';
                            }
                            else{
                                $_SESSION['alert']='<div class="alert alert-danger text-center">RECORD NOT INSERTED</div>';
                            }
                           
                    }//end of main else
                    */

                    


                }//end of main if


                ?>
                

                   
                </div>


        </div><!-- End of col-3 div-->

        <div class="col-lg-9 mt-5 bg-light rounded">
        <div class="row">
                    <div class="col-lg-9 m-auto">
                        <div class="bg-info text-center rounded">
                            <h2 class="text-light py-3">NEW MEMEBERS REGISTRATION</h2>
                        </div>

                        <?php

                        echo($_SESSION['alert']);
                        ?>
              

                         
                        <form action="addmember.php"method="POST"enctype="multipart/form-data">
                            <div class="form-group">
                                <p>Fullname:<input 

type="text"name="full_name"Placeholder="FULL NAME"class="form-control"></p>
                            </div>
                            <div class="form-group">
                                <p>Username:<input 

type="text"name="u_name"Placeholder="USERNAME"class="form-control"></p>
                            </div>
                            <div class="form-group">
                                <p>Password:<input 

type="password"name="password"Placeholder="PASSWORD"class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <p>E-mail:<input type="email"name="email"Placeholder="E-

MAIL"class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <p>Address:<input type="text-

area"name="address"Placeholder="ADDRESS"class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <p>Telephone No.:<input 

type="tel"name="phone"Placeholder="PHONE NO"class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <p>MembershipNo.:<input 

type="text"name="meno"Placeholder="MEMBERSHIP NO."class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <p>Date of Birth.:<input 

type="date"name="dob"class="form-control"></p>
                            </div>

                            <div class="form-group">
                                <input 

type="file"name="image"class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit"name="register"class="btn btn-lg 

btn-success py-1 my-0">REGISTER</button>
                            </div>

                        </form>
        </div>
        </div><!--End of row div.-->

      


    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>