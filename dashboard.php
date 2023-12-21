<?php
session_start();

include('includes/connection.php');

include("includes/header.php");
include("includes/navbar.php");



 if (isset($_SESSION["message"])) {
 // echo '<div class="message">' . $_SESSION["message"] . '</div>';
 print_r('$_SESSION["message"]');
 unset($_SESSION["message"]);
 }

 //session_start();
 if(!isset($_SESSION["email"])){
  // header("location:login.php");
 }
?>





<div class="py-5 mt-4">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<h2>login and registration system in php</h2>

<!-- <h1>Login Successfully. Welcome 
  <?php 
  //echo $_SESSION["name"];
   ?>
   </h1> -->



<?php 


if(isset( $_SESSION['color'] )){
   echo "<h3 style='color:green'; >". $_SESSION['color']."</h3>"; 
   unset( $_SESSION['color'] );
   
}
    if(isset($_SESSION["name"])){
      echo '<h1 class="text-info">'."welcome google login"."  ". $_SESSION["name"].'</h1>';
      unset($_SESSION["name"]);
    }


    if(isset($_SESSION["fb_name"])){
      echo '<h1 class="text-info">'."welcome facebook login"."  ". $_SESSION["fb_name"].'</h1>';
      unset($_SESSION["fb_name"]);
    }

    if(isset($_SESSION['user'])){
    
  $user_info = $_SESSION['user'];
  //echo $user_info['name'];
  echo '<h1 class="text-info">'."welcome github login"."  ". $user_info['name'].'</h1>';
  
  unset($_SESSION['user']);
    }
  
?>




</div>
</div>
</div>
</div>

<script src="js/main.js"></script>
  <?php include('includes/footer.php');?>
