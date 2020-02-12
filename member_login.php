<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/index.css">

</head>
<body>
    <div class="container">
    

    <div class="row">
        <div class="col-lg-9 m-auto mt-4">
            <div class="bg-info text-center rounded">
                <h2 class="text-light py-3">MEMBERS LOGIN</h2>
            </div>
        </div>
    </div>
    
       
        
    

        
        <?php

        if(!isset($_SESSION['error'])){
            echo('<div class="alert alert-info text-center col-md-6 m-auto"><?php echo($_SESSION[error]); ?></div>');
        }
            if(isset($_SESSION['error'])){
                echo('<div class="alert alert-danger text-center col-md-6 m-auto">ENTER DETAILS TO LOGIN</div>');
            }
           
        ?>

    <div class="row mt-5">
        <div class="col-lg-6 m-auto mt-1">
            <div class="card">
                <div class="card-heading bg-info text-center rounded">

                <img src="./images/profile2.jpg" alt="profile"class="card-img py-2">
                </div>
                <div class="card-body">
                    <form action="memberprocess.php"method="POST">
                        <div class="form-group m-3">
                            <label>USERNAME:</label>
                            <input type="text"name="uname"placeholder="Username"class="form-control">
                        </div>

                        <div class="form-group m-3">
                            <label>PASSWORD:</label>
                            <input type="password"name="pass"placeholder="Password"class="form-control">

                        <div class="form-group m-3">
                            <div class="row">
                                <div class="col-md-6 m-auto text-center">
                                <button type="submit"name="member_login"class="btn btn-info mt-4 py-1">MEMBER LOGIN</button>
                                </div>
                                
                                
                            </div>
                            <p class="text-center font-weight-bold py-2"><a href="index.php">Please Click to login as Admin</a></p>
                            
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    

   
  

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>