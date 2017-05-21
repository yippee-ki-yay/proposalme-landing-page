<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the notification when someone subscribes
    $emailTo = 'contact.azmind@gmail.com';

    $subscriber_email = addslashes(trim($_POST['email']));

    if(!isEmail($subscriber_email)) {
        $array = array();
        $array['valid'] = 0;
        $array['message'] = 'Insert a valid email address!';
        echo json_encode($array);
    }
    else {
        $array = array();
        $array['valid'] = 1;
        $array['message'] = 'Thanks for your subscription!';
        echo json_encode($array);

        // Send email
	    $subject = 'New Subscriber (nedy)!';
	    $body = "You have a new subscriber!\n\nEmail: " . $subscriber_email;

	    mail($emailTo, $subject, $body);
    }

}

?>