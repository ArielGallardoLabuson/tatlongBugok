<?php

include('connection.php');
require('./PHPMailerAutoload.php');

session_start();
$_SESSION['username1'] = $_SESSION['username']; 

if(isset($_POST['change'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
   
    $mail->Username = 'ariellabuson08@gmail.com';
    $mail->Password = 'ewvqtnnsurejlkeo';
   
    $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
    $mail->addAddress($email);
    $mail->addReplyTo('ariellabuson08@gmail.com');
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $mail->Subject = 'Santo Cristo';
    $mail->Body = 'Hi Mr/Ms '.$username. ' your verification code is ' . $verification_code;
    if (!$mail->send()) {
        echo "Messege could not be sent";
   } else {
        $_SESSION['code'] = $verification_code;  
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        echo '<script> window.location.href="http://localhost/barangaymanagementsystem/app/php/verify.php";</script>';
        
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../design/changepassword.css">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="formbox">
            <form action="" id="login" method="post">
                <input type="email" name="email" placeholder="Email">
                <input type="text" id="password_validation" name="password" placeholder="Password">
                <div class="password_validator">
                <ul>
                    <li class="lowercase"> <span>One Lowercase Letter</span> </li>
                    <li class="uppercase"> <span>One Uppercase Letter </span> </li>
                    <li class="number"> <span>One Number </span> </li>
                    <li class="special"> <span>One Special Character</span> </li>
                    <li class="charlength"> <span>At Least 8 Character </span> </li>
                </ul>
            </div>
            <input type="text" id="incorrect_validation" name="conpassword" placeholder="Confirm Password" required>
            <div class="incorrect_validator">     
            <span class="incorrect">Password and confirm password didn't match</span>
        </div>   
                <button type="submit" class="disabled " id="disabled" name="change"> Confirm</button>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="../function/script.js"></script>
</body>

</html>