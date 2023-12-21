<?php
session_start();
include('../includes/connection.php');
if (isset($_GET['code'])) {
    $client_id = "5b5fc3268020c5a533c4";
    $client_secret = "0ff4b969e1dc5d3399d26a2fd38f14619a7e3623";
    $redirect_uri = "http://localhost/loginsystem/github/callback.php";

    $code = $_GET['code'];

    // Prepare POST data
    $post = http_build_query(array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'code' => $code,
    ));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://github.com/login/oauth/access_token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Extract access token
    parse_str($response, $tokenData);
    $access_token = $tokenData['access_token'];

    // Fetch user data
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => ['User-Agent: PHP', "Authorization: token $access_token"]
        ]
    ];

    $context = stream_context_create($opts);
    $url = "https://api.github.com/user";
    $data = file_get_contents($url, false, $context);

    $user_data = json_decode($data, true);
    //echo "<pre>";
    //print_r($user_data);

    //echo "</pre>";
   // exit;
    $username = $user_data['login'];
  
  $github_id= $user_data['id'];
  $name= $user_data['name'];
 $img  =$user_data['avatar_url'];
 $github_url= $user_data['html_url'];
 $location= $user_data['location'];


 $sql = "SELECT * FROM github_users WHERE github_id ='$github_id'";
 
 $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists

    $github_id2 = mysqli_fetch_assoc($result);
   
    $github_id = $user_data['id'];
    
  } else {
    // user is not exists
    $sql1 = "INSERT INTO `github_users` (`github_id`, `name`, `username`, `location`, `picture`, `link`) VALUES ('$github_id', '$name', '$username', '$location', '$img', ' $github_url')";
   $result1 = mysqli_query($conn, $sql1) or die("query unsuccessful");
    if ($result1) {
     // print_r($result13);
     // exit;
     $github_id = $user_data['id'];
   } else {
      echo "User is not created";
     die();
    }
  }



// checking if user is already exists in database
$sql3 = "SELECT * FROM github_users WHERE github_id ='$github_id'";
$result2 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result2) > 0) {
 // user is exists
 $data2 = mysqli_fetch_assoc($result2);
}














 
 // echo $img;
 // exit;
    // Store user data in session or perform necessary actions
    $_SESSION['user'] = $user_data;
    $_SESSION["photo"]=$img;

    // Redirect to your desired page after successful login
    header("location:/loginsystem/dashboard.php");
} else {
    die("Error: No code received.");
}
