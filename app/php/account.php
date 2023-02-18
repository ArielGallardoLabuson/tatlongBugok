<?php
include('requestfunc.php');
session_start();
$username = $_SESSION['username'];
$sqlquery2 = "SELECT * FROM `residentsdata` WHERE username = '{$username}' ";
$sqlresult2 =  mysqli_query($connection, $sqlquery2);
$result = mysqli_fetch_array($sqlresult2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/announcement.css">
    <link rel="stylesheet" href="../design/account.css">
    <title>Barangay Management System</title>
</head>

<body>
    <div class="notifbox">
        <h1>Notifications</h1>
    </div>
    <div class="setbox">
        <h1>Settings</h1>
    </div>
    <div class="main">
        <div class="sidebar">
            <div class="picture">
                <img id="defaultpic" src="../images/defaultpicture.png" alt="">
                <h3>
                    <?php echo $result['name']; ?>
                </h3>
            </div>
            <a href="announcement.php" class="hyperlink">Announcement</a>
            <a href="history.php"  class="hyperlink">History</a>
            <a href="requestform.php" class="hyperlink">Request Form</a>
            <a href="account.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Account</a>
            <a href="qrcode.php" class="hyperlink">QR Code</a>

        </div>

        <div class="navbar">
            <div class="logouser">
                <img id="logouser" src="../images/Sto_Cristo_logo.png" alt="">
                <h3>Barangay Management System</h3>
            </div>
            <div class="notifbell">
                <img id="bell" src="../images/notifbell.png" alt="">
                <img id="set" src="../images/settings.png" alt="">
            </div>
            <div class="notifbellmobile">
            <img id="menuicon" src="../images/menuicon.png" alt="">
            <img id="bell1" src="../images/notifbell.png" alt="">
                <img id="set1" src="../images/settings.png" alt="">
            </div>
        </div>
        <div class="hero">
            <div class="accountbox">
                <h4>Name</h4>
                <p><?php echo $result['name']; ?></p>
                <h4>Email</h4>
                <p><?php echo $result['email']; ?></p>
                <h4>Phone</h4>
                <p><?php echo $result['contact']; ?></p>
                <h4>Gender</h4>
                <p><?php echo $result['sex']; ?></p>
                <h4>Birthday</h4>
                <p><?php echo $result['birthdate']; ?></p>
                <h4>Address</h4>
                <p><?php echo $result['address']; ?></p>
            </div>
        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>