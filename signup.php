<?php
session_start();

include('includes/connection.php');


$name = '';
$phone = '';
$email = '';
$pass = '';
$cp = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $cp = mysqli_real_escape_string($conn, $_POST["cp"]);
  
    $token = rand(100000,999999);
 
//Print the result and convert by binaryhexa
       // var_dump(bin2hex($token));
       // exit;  // Generate 16 random bytes
    // Validate email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email is valid
        // Check if passwords match and are not empty
        if (!empty($pass) && $pass === $cp) {
            // Passwords match and are not empty
            $emailQuery = "SELECT * FROM users WHERE email ='$email'";
            $query = mysqli_query($conn, $emailQuery) or die("Select query unsuccessful");
            $mailCount = mysqli_num_rows($query);
           
            $_SESSION['email11']=$email;
            
            if ($mailCount >= 1) {
                $_SESSION['message'] = "Email already exists";
              

                header("Location: registration.php");
                exit;
            } else {
               
                
                // Hash the password
                $pass_s = password_hash($pass, PASSWORD_DEFAULT);
               
               // $token = bin2hex($randomBytes);
                // Insert data into the database
               
                $sql = "INSERT INTO `users` (`name`,`phone`, `email`, `password`, `token`, `status`) VALUES ('$name', '$phone','$email', '$pass_s', '$token', 'inactive')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Registration successful
                    //header("Location: login.php");
                    //exit;

                  $subject = "Email verification";
                  $body = "hii $name. your 6 degit otp code :$token";

                  $sender_email = "From: mdehsan480@gmail.com";
                  if(mail($email, $subject, $body, $sender_email)) {
                   // $_SESSION['msg'] ="check your mail to activate your account $email";
                    header('location:loginactive.php');

                  }else{
                    echo "email sending failed";
                  }



                } else {
                   //   sleep(5);
                    $_SESSION["next"] = "Something went wrong with the insertion";
                    header("location: registration.php");
                    exit;
                }
            }
        } else {
            // Passwords do not match or empty
            $_SESSION["pass"] = "Passwords do not match or are empty";
           // sleep(5);
            header("location: registration.php");
            exit;
        }
    } else {
        // Invalid email format or empty
        $_SESSION['error'] = "Please enter a valid and non-empty email address";
         // sleep(5);
        header("Location: registration.php");
        exit;
    }
}
?>
