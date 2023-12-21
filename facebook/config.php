<?php

//initialize facebook sdk
require 'vendor/autoload.php';
//session_start();
$fb = new Facebook\Facebook([
  'app_id' => '922699686096179',
  'app_secret' => 'f7a8cb8cf501e45eaa006bdc2e272a10',
  'default_graph_version' => 'v2.5',

]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional

try {
  if (isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {
    $accessToken = $helper->getAccessToken();
  }
} catch (Facebook\Exceptions\facebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

?>