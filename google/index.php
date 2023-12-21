<?php
//session_start();
//Include Configuration File
include('config.php');
$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

 // $data = $obj->userinfo->get();
   
  if (!empty($data->email) && !empty($data->name)) {

    //if you want to register user details, place mysql insert query here

    $_SESSION["email"] = $data->email;
    $_SESSION["name"] = $data->name;
  
   $name1= $data['name'];
  $email1 =$data['email'];
 $photo1= $data['picture'];
  $token1=$data['id'];
  //print_r($photo1);
  
  //exit;
  $sql11 = "SELECT * FROM user_info WHERE email ='$email1'";
 
    $result12 = mysqli_query($conn, $sql11);
     if (mysqli_num_rows($result12) > 0) {
       // user is exists

       $data2 = mysqli_fetch_assoc($result12);
      
       $token1 = $data1['id'];
       
     } else {
       // user is not exists
       $sql13 = "INSERT INTO user_info (name, email, picture, G_ID) VALUES ('$name1', '$email1', '$photo1', '$token1')";
      $result13 = mysqli_query($conn, $sql13) or die("query unsuccessful");
       if ($result13) {
        // print_r($result13);
        // exit;
         $token1 = $data['id'];
      } else {
         echo "User is not created";
        die();
       }
     }

     // save user data into session
     $_SESSION["photo"] =$photo1;  
     
} else {
  if (!isset($_SESSION['token1'])) {
    header("Location: index.php");
    die();
  }

  // checking if user is already exists in database
  $sql = "SELECT * FROM users WHERE token ='$token1'";
  $result14 = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result14) > 0) {
    // user is exists
    $data4 = mysqli_fetch_assoc($result14);
  }
}
   
   
   
//$_SESSION['nav']= $_SESSION["email"];
   header("location:dashboard.php");
    exit;
  }
}
?>

  