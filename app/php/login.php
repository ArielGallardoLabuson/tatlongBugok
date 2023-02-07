
<?php
include('connection.php');
error_reporting(0);
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Barangay Management System</title>
    <link rel="stylesheet" href="../design/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="main">
        <div class="loginbox">
            <div class="logo">
                <img src="../images/Sto_Cristo_logo.png" alt="">
                <h2>Barangay Management System</h2>
                <h3>LOG IN</h3>
            </div>
            <div class="loginform">
                <form action="" method="post">
                <input type="text" class="username" name="username" placeholder="Enter username" value="<?php if (isset($_POST['submit'])) {
                echo $username;
                }?>" required>
                
                    <h4 class="alertusername">The username isn’t connected to an account. </h4>
                
                <input type="password" class="password" name="password" placeholder="Enter password" required>
                <h4 class="show">Show</h4>
                <h4 class="alertpassword" >The password you’ve entered is incorrect</h4>
                <button type="submit" class="submit" name="submit">Login</button>    
                <a href="">Forgot password?</a>
            </form>    
        </div>
        </div>
    </div>
    <?php

if(isset($_POST['submit'])){

        if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM residentsdata WHERE username = '{$username}'")) == 0) {
        echo "<script>
        const alertbox = document.querySelector('.alertusername');
        alertbox.classList.add('alertusername1')       
        </script>
        ";
        } else if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM residentsdata  WHERE password = '{$password}'")) == 0) {
            echo "<script>
            const alertbox = document.querySelector('.alertpassword');
            alertbox.classList.add('alertpassword1')       
            </script>";
        }
        else{
            echo '<script> window.location.href="http://localhost/barangaymanagementsystem/app/php/announcement.php";</script>';
        }
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>
</body>
</html>