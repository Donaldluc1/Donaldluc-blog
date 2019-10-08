<?php

use App\Connection;
use App\Model\Visitors;
use App\ObjectHelper;
use App\Table\VisitorsTable;
use App\Validators\VisitorsValidator;

$errors = [];
$visitors = new Visitors();
$pdo = Connection::getPDO();
$visitors->setCreatedAt(date('Y-m-d H:i:s'));


if(!empty($_POST)){
   $visitorsTable = new VisitorsTable($pdo);
    $v = new VisitorsValidator($_POST);
    ObjectHelper::hydrate($visitors, $_POST, ['username', 'phone', 'email']);
    if($v->validate()){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pdo->beginTransaction();
        $visitorsTable->createPost($visitors);
        $pdo->commit();

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer;

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "luciendonald93@gmail.com";
            $mail->Password = "Cissemariama1";
            $mail->setFrom('no-reply@thenewdisciple.epiry.com', 'the new disciple');
            $mail->addAddress($email, $username);
            $mail->Subject = 'Merci de votre souscription';
            $mail->msgHTML('<!DOCTYPE html><body></body>Nous vous remercions pour votre souscription à notre newsletter</html>');
            $mail->AltBody = 'Merci de votre souscription';
            


            if (!$mail->send()) { 
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header('Location: ' . $router->url('welcome') . '?success=1#contact');
                //Section 2: IMAP
                //Uncomment these to save your message in the 'Sent Mail' folder.
                #if (save_mail($mail)) {
                #    echo "Message saved!";
                #}
            }
    }else {
        $errors = $v->errors();
        header('Location: ' . $router->url('welcome') . '?failed=1#contact');
    }
}else {
    header('Location: ' . $router->url('welcome') . '?failed=1#contact');
}