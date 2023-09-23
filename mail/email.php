<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

?>

<?php
$sent=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $email=$_POST['email'];
    $name=$_POST['name'];
    $message=$_POST['desc'];


    $errors=[];

    if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
    {
        $errors[]="Please enter a valid email address";
    }

    if(empty($errors))
    {

        $mail=new PHPMailer(true); 

        try {
            //Server settings
            $mail->isSMTP();                                  //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';             //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                         //Enable SMTP authentication
            $mail->Username   = 'demoooacc06@gmail.com';      //SMTP username
            $mail->Password   = 'ngcf rlix aeoc snej';        //SMTP password
            $mail->SMTPSecure = 'tls';                        //Enable implicit TLS encryption
            $mail->Port       = 587;                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('demoooacc06@gmail.com');
            $mail->addAddress($email);
            $mail->addAddress('demoooacc06@gmail.com');
            $mail->Subject=$message;
            $mail->Body="Succesfully submitted a apppointment";
            $mail->isHTML(true);

            $mail->send();
            $sent=true;
            echo "Message sent";

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Contact</h1>

<?php if($sent):?>
    <p>Message sent.</p>
<?php endif;?>

<?php if(!empty($errors)):?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?php endforeach;?>
    </ul>
<?php endif ;?>


<form method="post">

    <div>
    Email:
    <input type="email" name="email">
    </div>

    <div>
    Name:
    <input type="text" name="name">
    </div>

    <div>
    Desc:
    <textarea name="desc" cols="30" rows="10">
    
    </textarea>
    </div>
    <button name="submit">Submit</button>



</form>
</body>
</html>