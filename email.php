<?php
$mailSuccess = false;
$mailFailed = null;
$mailMessage = null;
$redirect   = "http://www.silkynanda.eu/index.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function sendMail()
    {
        global $mailFailed, $mailSuccess, $mailMessage;
        if (empty($_POST['email'])) {
            $mailFailed = true;
            return;
        }
        if (empty($_POST['phone'])) {
            $mailFailed = true;
            return;
        }
        if (empty($_POST['message'])) {
            $mailFailed = true;
            return;
        }
        if (empty($_POST['name'])) {
            $mailFailed = true;
            return;
        }
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $fromEmail = 'silky@silkynanda.com';
        $telephone = trim($_POST['phone']);
        $mess = trim($_POST['message']);
        $message = "Name: $name<br>Email: $email<br>Phone: $telephone<br>Message: $mess";
        $from = ($name) ? $name . ' <' . $email . '>' : $email;
        $headers = "From: {$from}\r\nReply-To: {$from}\r\n";
        $headers .= "Content-type: text/html\r\n";
        $title = 'Contact by contactform';
        if (mail($to = 'silky@silkynanda.eu', $title, $message, $headers)) {
            $mailSuccess = "success";
         }   
         else {
            $mailSuccess = "fail";
            $mailMessage = 'Email sending failed';
        }
    }
    sendMail();
    header("Location: $redirect?mailSent=$mailSuccess#contact");
    echo $mailSuccess;
}
?>