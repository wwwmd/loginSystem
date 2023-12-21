<?php
require_once 'config.php';

if (isset($accessToken)) {
   if (isset($_SESSION['facebook_access_token'])) {
       $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
   } else {
     $_SESSION['facebook_access_token'] = (string) $accessToken;
     $oAuth2Client = $fb->getOAuth2Client();
     $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
     $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
     $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
   }
  
  
   
     try {
     
       $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
       $requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
       $picture = $requestPicture->getGraphUser();
       $profile = $profile_request->getGraphUser();
       
 
       $fbid = $profile->getProperty('id');           // To Get Facebook ID
       //print_r($fbid['id']);
      // exit;
       // $fbid=  get_object_vars($fbid);
   // var_dump($fbid);

      // exit;
       $fbfullname = $profile->getProperty('name');   // To Get Facebook full name
       $fbemail = $profile->getProperty('email');    //  To Get Facebook email
       $fbpic = "<img src='" . $picture['url'] . "' class='img-rounded'/>";
       //echo "<pre>";
       //print_r($profile);
       //echo "<pre>";
       // store in userinformaton in session
       $_SESSION['fb_id'] = $fbid . '</br>';
       $_SESSION['fb_name'] = $fbfullname . '</br>';
       $_SESSION['fb_email'] = $fbemail . '</br>';
       $_SESSION['fb_pic'] = $fbpic . '</br>';
       $_SESSION['profile'] = $picture;
       $_SESSION['ok'] = $profile;
   
     } catch (Facebook\Exceptions\FacebookResponseException $e) {
       echo 'Graph returned an error: ' . $e->getMessage();
       exit;
   
     } catch (Facebook\Exceptions\FacebookSDKException $e) {
       echo 'Facebook SDK returned an error: ' . $e->getMessage();
       exit;
     }
 } else {

   // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
   $loginUrl = $helper->getLoginUrl('http://localhost/loginsystem/', $permissions);
   //echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
   $_SESSION['facebook']=$loginUrl;
 }





 // ...

// Fetch the user from the database if already exists
$sql = "SELECT * FROM facebook_users WHERE email ='$fbemail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User exists, retrieve user data
    $fbUser = mysqli_fetch_assoc($result);

    // Assign fetched values to variables
    $fbemail = $fbUser['email'];
    $fbid = $fbUser['f_id'];
} else {
    // User does not exist and email is not empty, insert into the database
    if (!empty($fbemail)) {
        $sql1 = "INSERT INTO `facebook_users` (`name`, `email`, `f_id`) VALUES ('$fbfullname', '$fbemail', '$fbid')";
        $result1 = mysqli_query($conn, $sql1) or die("Query unsuccessful: " . mysqli_error($conn));

        if (!$result1) {
            echo "User was not created";
            die();
        }
    }
}

// Redirect if session variables are set
if (isset($_SESSION['fb_id'])) {

  $_SESSION['nav']= $_SESSION['fb_id'];
    header("Location: dashboard.php");
    exit;
}

