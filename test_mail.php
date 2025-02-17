<?php
$to = "julian.carstens@tornau-motoren.de";
$subject = "Test Email";
$message = "This is a test email from Alfahosting.";
$headers = "From: test@yourdomain.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail failed!";
}
?>
