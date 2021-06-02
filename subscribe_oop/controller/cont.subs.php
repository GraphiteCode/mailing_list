<?php

if (empty($_SERVER['REQUEST_METHOD'] == 'POST')) { //Check for $POST Request
    include 'views/view.subform.php'; // Submission Form
} else {
    $email = htmlspecialchars($_POST['email']); //Escape Special Characters & Assign Variable
    $domain = substr($email, strpos($email, '@') + 1); // Split E-mail & Get Domain
    if (
        !filter_var($email, FILTER_VALIDATE_EMAIL) || // Validate E-mail format
        !checkdnsrr($domain) //Check DNS records for Domain
    ) {
        $alert = 'Invalid email.'; // Invalid E-mail Alert
        include 'views/view.subform.php'; // Submission Form

    } else {
        $subs->checkDuplicates($email); // Check for Duplicate E-mails
        if ($subs->duplicates > 0) { // Check Duplicate Count
            $alert =  'E-mail already submitted.'; // Duplicate Alert
            include 'views/view.subform.php'; // Submission Form
            // print_r($subs->duplicates); // Display number of Duplicate Rows

        } else {
            $subs->insertSubs($email); // Insert E-mail 
            $alert = 'Thank you for Subscribing!'; //Subscription Confirmation
            include 'views/view.subform.php'; // Submission Form
        }
    }
}
