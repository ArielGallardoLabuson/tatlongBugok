<?php

include('connection.php');
require('./PHPMailerAutoload.php');

session_start();
$_SESSION['username1'] = $_SESSION['username'];

if (isset($_POST['change'])) {
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
  $mail->Body = 'Hi Mr/Ms ' . $username . ' your verification code is ' . $verification_code;
  if (!$mail->send()) {
    echo "Messege could not be sent";
  } else {
    $_SESSION['code'] = $verification_code;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    echo '<script> window.location.href="http://192.168.254.159//barangaymanagementsystem/app/php/verify.php";</script>';


  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@700&family=Roboto:wght@700&display=swap"
    rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
  <link rel="stylesheet" type="text/css" href="../design/changepassword.css">
  <title>Barangay Management System</title>
</head>

<body>

  <link rel="stylesheet" href="../design/loader.css">
  <div class="loader"></div>
  <script>
    window.addEventListener("load", () => {
      const loader = document.querySelector(".loader");

      loader.classList.add("loader--hidden");

      loader.addEventListener("transitionend", () => {
        document.body.removeChild(loader);
      });
    });
  </script>
  <div class="main">
    <div class="formbox">
      <form action="" id="login" method="post">
        <h2>Change email and password</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" id="password_validation" name="password" placeholder="Password" required>
        <h4 class="showchange">Show</h4>
        <div class="password_validator">
          <ul>
            <li class="lowercase"> <span>One Lowercase Letter</span> </li>
            <li class="uppercase"> <span>One Uppercase Letter </span> </li>
            <li class="number"> <span>One Number </span> </li>
            <li class="special"> <span>One Special Character</span> </li>
            <li class="charlength"> <span>At Least 8 Character </span> </li>
          </ul>
        </div>
        <input type="password" id="incorrect_validation" name="conpassword" placeholder="Confirm Password" required>
        <h4 class="showchange1">Show</h4>
        <div class="incorrect_validator">
          <span class="incorrect">Password and confirm password didn't match</span>
        </div>
        <button type="submit" class="disabled " id="disabled" name="change"> Confirm</button>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript" src="../function/script.js"></script>
  <script>
    const show = document.querySelector('.showchange');
    let status = 1;
    show.addEventListener('click', () => {
      if (status == 1) {
        status = 0;
        show.innerHTML = 'Hide'
        document.querySelector('#password_validation').type = 'text';
        return
      }
      if (status == 0) {
        show.innerHTML = 'Show'
        status = 1
        document.querySelector('#password_validation').type = 'password';
        return
      }
    })
    const show1 = document.querySelector('.showchange1');
    let status1 = 1;
    show1.addEventListener('click', () => {
      if (status1 == 1) {
        status1 = 0;
        show1.innerHTML = 'Hide'
        document.querySelector('#incorrect_validation').type = 'text';
        return
      }
      if (status1 == 0) {
        show1.innerHTML = 'Show'
        status1 = 1
        document.querySelector('#incorrect_validation').type = 'password';
        return
      }
    })
  </script>
</body>

</html>