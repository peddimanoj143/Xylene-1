<?php
   require 'vendor/autoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
  // header("Location: thankyou.html");
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $address = $_POST['address'];
        $contact = htmlspecialchars($_POST['phone']);
    
        // Your email address
        $to = 'divyesh@xylenepharmaceuticals.com.tld';
    
        $subject = 'New Enquiry from ' . $name;
    
        $headers = "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
        $body = "Name: " . $name . "\n\nEmail: " . $email . "\n\nMessage: " . $message;
       // header("Location: thankyou.html");   
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'xylenepharmaceuticals@gmail.com';
        $mail->Password = 'Kashyap@098';
        $mail->setFrom($email, $name);
        $mail->addReplyTo('divyesh@xylenepharmaceuticals.com', 'Divyesh');
        $mail->addAddress('divyesh@xylenepharmaceuticals.com', 'Divyesh');
        $mail->Subject = 'Inquiry';
        //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = $body;
        //$mail->addAttachment('attachment.txt');
        if (!$mail->send()) {
            header("Location: error.html");
            exit;
        } else {
            header("Location: thankyou.html");
            exit;
        }
   }
?>