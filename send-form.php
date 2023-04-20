<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create new PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // Configure mail settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'asvat980@gmail.com';
        $mail->Password = 'Ismail@786';

        // Set sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('recipient-email@example.com', 'Recipient Name');

        // Set email content
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo 'Message sent!';
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
