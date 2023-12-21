
<?php

session_start(); // Start the session

include('includes/connection.php');
include("includes/header.php");
include("includes/navbar.php");
if (isset($_SESSION['result'])) {
  $_SESSION["result"];
  unset($_SESSION['result']);


  if (isset($_SESSION["mess"])) {
    echo $_SESSION["mess"];
    //echo '<h2 class="mess">' . $_SESSION["messa"] . '</h2>';
    unset($_SESSION["mess"]);
  }



  if (isset($_SESSION['github_data'])) {
    // Redirection to application home page.
    header("location: home.php");
    }
}




//echo $_SESSION['result'];


if (isset($_POST["login_btn"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $pass = mysqli_real_escape_string($conn, $_POST["password"]);
  $query = "SELECT * FROM `users` WHERE `email`='$email'and status='active'";


  $result = mysqli_query($conn, $query) or die("query unsuccessful");
  $num = mysqli_num_rows($result);


  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {


      if (password_verify($pass, $row['password'])) {

        $login = true;
        $_SESSION['nav'] = true;
        $_SESSION['color'] = true;
        echo $_SESSION['color'] = "welcome" . " " . $row['name'];
        header("Location:dashboard.php");

        //    echo '<script type="text/javascript">
        //    // Redirect to the login page
        //    window.location.href = "index.php"; // 
        //  </script>';
        exit;

      } else {

        $_SESSION['password'] = "your password wrong";
        // echo "your password has wrong";

      }
    }

  } else {

    $_SESSION['email'] = "your email not found";


  }

}


?>

<?php
include('google/index.php');
include('facebook/index.php');

  ?>


  <section class="login-block">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <form class="md-float-material form-material" method="POST"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="auth-box card mt-0">
              <div class="card-block">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="text-center heading mb-3">Login Form</h3>


                    <h5 class=" text-danger text-center">
                      <?php
                      if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);

                      }

                      ?>
                    </h5>
                  




                  <div class="form-group form-primary">
                    <input type="text" class="form-control" name="email" value="" placeholder="Email" id="email">
                    <span style="color:red">
                      <?php if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                      }
                      ?>
                    </span>
                    </div>
                  



                  <div class="form-group form-primary">
                    <input type="password" class="form-control" name="password" placeholder="Password" value=""
                      id="password">



                    <span style="color:red">
                      <?php if (isset($_SESSION['password'])) {
                        echo $_SESSION['password'];
                        unset($_SESSION['password']);
                      }


                      ?>
                    </span>
                  </div>


                  <div class="row">
                    <div class="col-md-12">

                      <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"
                        name="login_btn" value="Login Now">

                    </div>
                  </div>

                  <div class="or-container">
                    <div class="line-separator"></div>
                    <div class="or-label">or</div>
                    <div class="line-separator"></div>
                  </div>
                  

                  <div class="row">
                    <div class="col-md-4">
                      <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                        href='<?php echo $google_client->createAuthUrl(); ?>'><img
                          src="https://img.icons8.com/color/16/000000/google-logo.png" height="30"> Login</a>
                          </div>
                          <div class="col-md-4">
                          <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                        href='<?php echo $loginUrl ?>'><img
                          src="https://cdn.logojoy.com/wp-content/uploads/20230921104408/Facebook-logo-600x319.png" height="30"> Login</a>
                          </div>
                          <div class="col-md-4">
                          <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                        href='github/home.php'><img
                          src="https://1000logos.net/wp-content/uploads/2021/05/GitHub-logo.png" height="30"> Login</a>
                          </div>
                          
                          </div>

                    </div>
                  </div>
                  <br>
                  <br>

                  <p class="text-inverse text-center">Already have an account? <a href="registration.php">singup here</a></p>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  

  <script src="js/main.js"></script>
  <?php include('includes/footer.php');?>








  