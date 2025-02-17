<?php
// Sanitize inputs
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$email_from = 'admin@saankhya.academy';
$email_subject = 'New Form Submission';
$email_body  = "User Name: $name.\n". 
               "User Email: $visitor_email.\n". 
               "Subject: $subject.\n". 
               "User Message: $message.\n";

$to = 'akshayramesh751@gmail.com';

// Set headers
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

// Check if mail function succeeds
if (mail($to, $email_subject, $email_body, $headers)) {
    header("Location: contact.html");
} else {
    echo "Email sending failed.";
}
?>
