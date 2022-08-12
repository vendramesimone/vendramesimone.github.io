<?php

// Replace this with your own email address
$siteOwnersEmail = 'vendramephotographer@gmail.com';


if($_POST) {

    $name = trim(stripslashes($_POST['contactName']));
    $email = trim(stripslashes($_POST['contactEmail']));
    $subject = trim(stripslashes($_POST['contactSubject']));
    $contact_message = trim(stripslashes($_POST['contactMessage']));

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Per favore inserisci il tuo nome";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Per favore inserisci un indirizzo email valido";
    }
    // Check Message
    if (strlen($contact_message) < 15) {
        $error['message'] = "Per favore scrivi un messaggio. Deve contenere almeno 15 caratteri";
    }
    // Subject
    if ($subject == '') { $subject = "Contact Form Submission"; }


    // Set Message
    $message .= "Email da: " . $name . "<br />";
    $message .= "Indirizzo email: " . $email . "<br />";
    $message .= "Messaggio: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> Questa mail è stata mandata dal form del sito <br />";

    // Set From: header
    $from =  $name . " <" . $email . ">";

    // Email Headers
    $headers = "Da: " . $from . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    if (!$error) {

        ini_set("sendmail_from", $siteOwnersEmail); // for windows server
        $mail = mail($siteOwnersEmail, $subject, $message, $headers);

        if ($mail) { echo "OK"; }
        else { echo "Something went wrong. Please try again."; }
        
    } # end if - no validation error

    else {

        $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
        $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
        $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
        
        echo $response;

    } # end if - there was a validation error

}

?>