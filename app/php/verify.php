<?php
session_start();
$username = $_SESSION['username1'];
if ($_SESSION['status'] == 'valid') {

    echo "<script>window.location.href='announcement.php'</script>";
}
if ($_SESSION['status'] == 'valid1') {

    echo "<script>window.location.href='dashboard.php'</script>";
}
if ($_SESSION['status'] == 'valid2') {

    echo "<script>window.location.href='changepassword.php'</script>";
}
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/verify.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
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

        <div class="verification-box">
            <div class="verify">
                <h1>Verify Email</h1>
                <h3 class="h3v">verification has been sent to your email</h3>

            </div>
            <form action="" method="post">
                <input type="number" class="number" id="1" name="number1" onkeyup="move(event,'','1','2')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <input type="number" class="number" id="2" name="number2" onkeyup="move(event,'1','2','3')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <input type="number" class="number" id="3" name="number3" onkeyup="move(event,'2','3','4')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <input type="number" class="number" id="4" name="number4" onkeyup="move(event,'3','4','5')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <input type="number" class="number" id="5" name="number5" onkeyup="move(event,'4','5','6')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <input type="number" class="number" id="6" name="number6" onkeyup="move(event,'5','6','')"
                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;">
                <div class="code">
                    <h3 class="h3">verification code is not correct</h3>
                    <button type="submit" class="updatebtn" name="updatebtn">Didn't get a code?</button>
                </div>
                <div class="btn">
                    <button type="submit" class="verifybtn" name="verifybtn">Verify</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'connection.php';
    require('./PHPMailerAutoload.php');

    $email = $_SESSION['email'];
    $username = $_SESSION['username1'];
    $code = $_SESSION['code'];
    $pass = md5($_SESSION['password']);
    if (isset($_POST['verifybtn'])) {
        $number1 = mysqli_real_escape_string($connection, $_POST['number1']);
        $number2 = mysqli_real_escape_string($connection, $_POST['number2']);
        $number3 = mysqli_real_escape_string($connection, $_POST['number3']);
        $number4 = mysqli_real_escape_string($connection, $_POST['number4']);
        $number5 = mysqli_real_escape_string($connection, $_POST['number5']);
        $number6 = mysqli_real_escape_string($connection, $_POST['number6']);
        $number = $number1 . $number2 . $number3 . $number4 . $number5 . $number6;

        if ($number === $code) {
            session_start();
            $sql = "UPDATE residentsdata SET `password`='{$pass}',`loginattempt`= 1,`email` = '{$email}' WHERE `username` = '{$username}'";
            $query = mysqli_query($connection, $sql);
            $_SESSION['status'] = 'invalid';
            $_SESSION['status1'] = 'invalid';
            unset($_SESSION['email']);
            unset($_SESSION['username']);
            echo '<script> window.location.href="http://192.168.254.159//barangaymanagementsystem/app/php/login.php";</script>';


        } else {
            echo "<script>
            const alertbox = document.querySelector('.h3');
            alertbox.classList.add('alerth3')       
            </script>";
        }
    }
    if (isset($_POST['updatebtn'])) {
        $email = $_SESSION['email'];

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'ariellabuson08@gmail.com';
        $mail->Password = 'hkndtmbwzmhjwkzh';

        $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
        $mail->addAddress($email);
        $mail->addReplyTo('ariellabuson08@gmail.com');

        $mail->isHTML(true);
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Santo Cristo';
        $mail->Body = 'Hi Mr/Ms ' . $username . ' your verification code is ' . $verification_code;
        ;
        if (!$mail->send()) {
            echo "Messege could not be sent";
        } else {
            $sql = "UPDATE `residentsdata` SET `code`='$verification_code' WHERE username = '{$username}'";
            $queryupdate = mysqli_query($connection, $sql);


            echo "<script>
const alertbox = document.querySelector('.h3v');
alertbox.classList.add('alerth3')       
</script>";

        }
    }


    ?>

    <script>
        function move(e, p, c, n) {
            const length = document.getElementById(c).value.length;
            const maxlength = 1;

            console.log(length);
            console.log(maxlength);

            if (length == maxlength) {
                if (n !== "") {
                    document.getElementById(n).focus();
                }
            }
            if (e.key == "Backspace") {
                document.getElementById(p).focus();
            }

        }
        btnloader = document.querySelector('.verifybtn')
        btnloader.onclick= function(){
            this.innerHTML = "<div class='btnloader'></div>"
        }
    </script>
</body>

</html>