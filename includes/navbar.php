<?php
//session_start(); // Start the session
?>

<?php
if (isset($_SESSION['nav']) && $_SESSION['nav'] == true || isset($_SESSION["photo"])) {
    echo '<nav class="navbar navbar-expand-lg fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Login System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 px-4">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="showusers.php">Show Users</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>';

    if (isset($_SESSION["photo"])) { ?>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <img style="border-radius: 50%; width: 50px; height: 50px;" class="showimg" src="<?php echo $_SESSION["photo"]; ?>" alt="">
            </a>
        </li>
        <?php unset($_SESSION["photo"]); ?>
    <?php } ?>

    </ul>
    </div>
    </div>
    </nav>';
 <?php } else { 
    // Display something else or redirect to login page for non-logged-in users
    echo '<nav class="navbar navbar-expand-lg fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Login System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 px-4">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
}


?>

<style>
   .showimg{
                    position: absolute;
                    right: 30px;
                    top: 5px;
                  }
</style>
