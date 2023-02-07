<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/announcement.css">
    <link rel="stylesheet" href="../design/requestform.css">
    <title>Document</title>
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
                <h3>Ariel Labuson</h3>
            </div>
            <a href="announcement.php" class="hyperlink">Announcement</a>
            <a href="history.php"  class="hyperlink">History</a>
            <a href="requestform.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Request Form</a>
            <a href="account.php" class="hyperlink">Account</a>
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
        </div>
        <div class="hero">
            <div class="requestformbox">
                
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>