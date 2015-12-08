<?php
    // Only process POST reqeusts.
   print_r('Your e-mail has been send!');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $subject = strip_tags(trim($_POST["subject"]));
                $subject = str_replace(array("\r","\n"),array(" "," "),$subject);
        
        $phone = trim($_POST["phone"]);
        $name = trim($_POST["name"]);
​
        $message = trim($_POST["message"]);
​
        // Check that data was sent to the mailer.
        if ( empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Your message has not been send, please fill in all the fields.";
            exit;
        }
​
        //Recipient
        $recipient = "silkypuri28@gmail.com";
        //Content
        $email_content = "Contact details: \n\n";
        $email_content .= "Send by: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Phone: $phone\n";
        $email_content .= "Subject: $subject\n";
        $email_content .= "\nMessage:\n\n$message\n";
​
        //Email headers.
        $email_headers = "From: <$email>";
        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Uw bericht is verzonden."; 
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Bericht niet verzonden.";
        }
​
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Bericht niet verzonden.";
    }
​
?>