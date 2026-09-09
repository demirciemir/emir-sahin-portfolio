<?php
//Contact Form in PHP
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$message = htmlspecialchars($_POST['message']);

if (!empty($name) && !empty($email) && !empty($message)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $receiver = "email@example.com"; //enter that email address where you want to receive all messages
        $subject = "From: $name <$email>";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message\n\nRegards,\n$name";
        $headers = 'From: ' . $email . '' . "\r\n" .
            'Reply-To: ' . $email . '' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        if (mail($receiver, $subject, $body, $headers)) {
            echo "Your message has been sent";
        } else {
            echo "Sorry, failed to send your message!";
        }
    } else {
        echo "Enter a valid email address!";
    }
} else {
    echo "Name, email and message field is required!";
}
