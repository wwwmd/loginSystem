<?php
session_start();
include('includes/connection.php');

include("includes/header.php");
include("includes/navbar.php");
?>

  <?php
  if (isset($_SESSION["next"])) {
    echo $_SESSION["next"];
    unset($_SESSION["next"]);
  }

  if (isset($_POST["email1"]))
    echo $_POST["email1"];
  unset($_POST["email1"]);

  if (isset($_POST["pass2"])) {
    echo $_POST["pass2"];
    unset($_POST["pass2"]);
  }
  ?>


  <div class="py-3">
    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-6">
          <div class="card shadow mt-5">
            <div class="card-header">
              <h5>Registration form</h5>
              <h5 class ="text-danger"><?php 
             
              
              
              ?></h5>
            </div>

            <div class="card-body">
              <form method="POST" action="signup.php" id="myForm">


                <div class="form-group mb-3">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                  <span id="nameError" class="error" style='color:red' ;></span>

                </div>


                <div class="form-group mb-3">
                  <label for="">Phone Number</label>
                  <input type="text" name="phone" id="phone" class="form-control">
                  <span id="phoneError" class="error" style='color:red' ;></span>
                </div>



                <div class="form-group mb-3">
                  <label for="">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control">
                  <span id="emailError" class="error" style='color:red' ;></span>
                  <?php
                  if (isset($_SESSION['message'])) {
                    echo "<h6 style='color:red'; >" . $_SESSION['message'] . "</h6>";
                    unset($_SESSION['message']);
                  }

                  if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                  }


                  ?>

                </div>

                <div class="form-group mb-3">
                  <label for="">Password</label>
                  <input type="password" name="pass" id="password" class="form-control">
                  <span id="passwordError" class="error" style='color:red' ;></span>
                  <?php

                  if (isset($_SESSION["pass"])) {
                    echo $_SESSION["pass"];
                    unset($_SESSION["pass"]);

                  }
                  if (isset($_SESSION['pass'])) {
                    echo "<h6 style='color:red'; >" . $_SESSION['pass'] . "</h6>";
                    unset($_SESSION['pass']);
                  }
                  ?>
                </div>


                <div class="form-group mb-3">
                  <label for="">Confirm Password</label>
                  <input type="password" name="cp" id="confirmPassword" class="form-control">
                  <span id="confirmPasswordError" class="error" style='color:red' ;></span>




                </div>

                <div class="form-group">
                  <button type="submit" name="register_btn" class="btn btn-primary" id="login_button">Register
                    Now</button>
                </div>


              </form>



            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
   <script src="js/main.js"></script>
  <?php include('includes/footer.php');?>








  


