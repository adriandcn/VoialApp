<?php

// =======
// ATTENTION
// =======
// If you want to use SMTP protocol, set $isSMTP var to true;
// And set configuration of your SMTP into $SMTPSettings array;
// =======

$isSMTP = false;

$SMTPSettings = [
    'host' => 'smtp.gmail.com',      // SMTP hostname
    'port' => 465,                   // SMTP port
    'username' => 'test@gmail.com',  // Email username  // Format example - youremail@gmail.com or youremail (depends on it`s email provider)
    'password' => '',                // Your youremail@gmail.com password
    'email' => 'test@gmail.com'      // Email on your SMTP. Example - youremail@gmail.com
];

date_default_timezone_set('Etc/UTC');

try {
    require './phpmailer/PHPMailerAutoload.php';

    $recipients = $_POST['recipients'];

    unset($_POST['recipients']);

    preg_match_all("/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)/", $recipients, $addresses, PREG_OFFSET_CAPTURE);

    if (!count($addresses[0])) {
        die('MF001');
    }

    function getRemoteIPAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];

        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    if (preg_match('/^(127\.|192\.168\.)/', getRemoteIPAddress())) {
        die('MF002');
    }

    $template = file_get_contents('rd-mailform.tpl');

    if (isset($_POST['form-type'])) {
        switch ($_POST['form-type']){
            case 'contact':
                $subject = 'A message from your site visitor';
                break;
            case 'subscribe':
                $subject = 'Subscribe request';
                break;
            case 'order':
                $subject = 'Order request';
                break;
            default:
                $subject = 'A message from your site visitor';
                break;
        }
    }else{
        die('MF004');
    }

    if (isset($_POST['contact-email'])) {
        $template = str_replace(
            array("<!-- #{FromState} -->", "<!-- #{FromEmail} -->"),
            array("Email:", $_POST['contact-email']),
            $template);
    }

    if (isset($_POST['contact-message'])) {
        $template = str_replace(
            array("<!-- #{MessageState} -->", "<!-- #{MessageDescription} -->"),
            array("Message:", $_POST['contact-message']),
            $template);
    }

    preg_match("/(<!-- #{BeginInfo} -->)(.|\n)+(<!-- #{EndInfo} -->)/", $template, $tmp, PREG_OFFSET_CAPTURE);
    foreach ($_POST as $key => $value) {
        if ($key != "contact-email" && $key != "contact-message" && $key != "form-type" && $key != "g-recaptcha-response" && !empty($value)){
            $info = str_replace(
                array("<!-- #{BeginInfo} -->", "<!-- #{InfoState} -->", "<!-- #{InfoDescription} -->"),
                array("", ucfirst($key) . ':', $value),
                $tmp[0][0]);

            $template = str_replace("<!-- #{EndInfo} -->", $info, $template);
        }
    }

    $template = str_replace(
        array("<!-- #{Subject} -->", "<!-- #{SiteName} -->"),
        array($subject, $_SERVER['SERVER_NAME']),
        $template);

    $mail = new PHPMailer();


    if ($isSMTP) {
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        $mail->Debugoutput = 'html';

        // Set the hostname of the mail server
        $mail->Host = $SMTPSettings['host'];

        // Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = $SMTPSettings['port'];

        // Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";

        // Username to use for SMTP authentication
        $mail->Username = $SMTPSettings['username'];

        // Password to use for SMTP authentication
        $mail->Password = $SMTPSettings['password'];
        $mail->From = $SMTPSettings['email'];
    } else {
        $mail->From = $_POST['contact-email'];
    }

    # Attach file
    if (isset($_FILES['file']) &&
        $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $mail->AddAttachment($_FILES['file']['tmp_name'],
            $_FILES['file']['name']);
    }

    if (isset($_POST['contact-name'])){
        $mail->FromName = $_POST['contact-name'];
    }else{
        $mail->FromName = "Site Visitor";
    }

    foreach ($addresses[0] as $key => $value) {
        $mail->addAddress($value[0]);
    }

    $mail->CharSet = 'utf-8';
    $mail->Subject = $subject;
    $mail->MsgHTML($template);
    $mail->send();

    die('MF000');
} catch (phpmailerException $e) {
    die('MF254');
} catch (Exception $e) {
    die('MF255');
}