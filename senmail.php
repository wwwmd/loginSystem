<?php


 $to_email = "mdsabirpokhrauni@gmail.com";
$subject = "Simple Email Test via PHP";
 $body = "Hi, This is test email send by PHP Script mdehsan ali";
 $headers = "From:mdehsan480@gmail.com";

 if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {     echo "Email sending failed...";
}



?>