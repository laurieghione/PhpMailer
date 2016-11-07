<?php
/**
 * User: laurie Ghione
 * Date: 08/11/2016
 * Time: 00:21
 */

error_reporting(E_STRICT);
date_default_timezone_set('Europe/Paris');

require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');

$mail = new PHPMailer();
$mail->SetLanguage('fr');
$mail->IsMail();
$mail->SMTPDebug = false;
$mail->SMTPAuth = true;

$mail->Host = "auth.smtp.fr";
$mail->Port = 587;
$mail->Username = "contact@laurieghione.fr";
$mail->Password = "changeMe";
$mail->From = "noreply@laurieghione.fr";
$mail->FromName = "laurieghione.fr";

$mail->CharSet = 'iso-8859-1';
$mail->ContentType = 'text/plain';
$mail->Encoding = '8bit';

$mail->Subject = "Nouveau Message";

$msg = "<html>
    <body>Bonjour,
    <br/>Vous avez reçu un nouveau message
    <br/>
    <p>- Nom : " . $_POST['name'] . "</p>
    <p>- Email : " . $_POST['email'] . "</p>
    <p>- Sujet : " . $_POST['subject'] . "</p>
    <p>- Message : " . $_POST['message'] . "</p>
    </body>
</html>";
$mail->MsgHTML($msg);
$mail->WordWrap = 0;

$mail->AddAddress("test@laurieghione.fr");

$mail->Send();
?>