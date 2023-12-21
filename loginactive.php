<?php
session_start();
include('includes/connection.php');

 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = mysqli_real_escape_string($conn, $_POST["otp"]);
    

    // Check if the provided OTP matches any user's token in the database
    $check_query = "SELECT * FROM users WHERE token = '$entered_otp'";
    $result = mysqli_query($conn, $check_query);
    


    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $update_query = "UPDATE users SET status = 'active' WHERE token = '$entered_otp'";
            $query = mysqli_query($conn, $update_query);

            if ($query) {
                $_SESSION['msg'] = "Account updated successfully";
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error'] = "Failed to update account.";
               // //header('Location: loginactive.php');
                echo "falled to update account";
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid OTP. Please try again.";
           //echo "invalid otp . please try again";
           // header('Location: loginactive.php');
            
        }
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PHP OTP Login Form</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type="text/css">
         .login-form {
         width: 340px;
         margin: 50px auto;
         }
         .login-form form {
         margin-bottom: 15px;
         background: #f7f7f7;
         box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
         padding: 30px;
         }
         .login-form h2 {
         margin: 0 0 15px;
         }
         .form-control,
         .btn {
         min-height: 38px;
         border-radius: 2px;
         }
         .btn {
         font-size: 15px;
         font-weight: bold;
         }
      </style>
   </head>
   <body>
      <div class="login-form">
         <form method="post" action=loginactive.php>
             <h5 class="text-center text-danger"><?php if (isset($_SESSION['error'])) {
     echo $_SESSION['error'];
     unset($_SESSION['error']);
 }?></h5>
            <h3 class="text-center text-warning mb-3">
            Please enter the one time password to verify your account<h3>
              <h4 class="text-center text-warning py-2"><?php 
              
              if(isset($_SESSION['email11'])){
                echo $_SESSION['email11'];
              //unset($_SESSION['email11']);
              }
              
              ?></h4>
            <div class="form-group first_box">
               <input type="text" 
                  class="form-control"
                  name="otp" placehoder="One Time Password">
               
            </div>
            <div class="form-group first_box">
               <button type="submit"
                  class="btn btn-danger btn-block"
                  >validate</button>
            </div>

           
         </form>
      </div>
     
      
   </body>
</html>