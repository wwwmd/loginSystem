<?php
session_start();

$client_id = "5b5fc3268020c5a533c4";
$redirect_uri = "http://localhost/loginsystem/github/callback.php";
//exit;
if (!isset($_SESSION['access_token'])) {
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);
    unset($_SESSION['access_token']);
}

$login_url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_uri&state={$_SESSION['state']}&scope=user";

header("Location: $login_url");
exit();
?>
