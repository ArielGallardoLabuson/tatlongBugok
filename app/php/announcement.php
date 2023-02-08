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
                <h3><?php echo $result['name'];?></h3>
            </div>
            <a href="announcement.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Announcement</a>
                <a href="history.php"  class="hyperlink">History</a>
                <a href="requestform.php" class="hyperlink">Request Form</a>
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
            <div class="announcements">
                <div class="header">
                    <h2>Announcements</h2>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
                <div class="body">
                    <div class="content">
                        <h3>Sample announcement</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, iste.</p>
                    </div>
                </div>
            </div>
            <div class="events">
                <div class="header">
                    <h2>Events</h2>
                </div>
                <div class="eventbox">

                    <div class="date">
                        <h4>January</h4>
                        <h2>31</h2>
                    </div>
                    <div class="what">
                        <div class="title">
                            <h2 id="title">Sample event</h2>

                        </div>
                        <div class="time">
                            <h4 id="time">10:00 PM</h4>
                        </div>
                    </div>
                </div>
                <div class="eventbox">

                    <div class="date">
                        <h4>January</h4>
                        <h2>31</h2>
                    </div>
                    <div class="what">
                        <div class="title">
                            <h2 id="title">Sample event</h2>

                        </div>
                        <div class="time">
                            <h4 id="time">10:00 PM</h4>
                        </div>
                    </div>
                </div>
                <div class="eventbox">

                    <div class="date">
                        <h4>January</h4>
                        <h2>31</h2>
                    </div>
                    <div class="what">
                        <div class="title">
                            <h2 id="title">Sample event</h2>

                        </div>
                        <div class="time">
                            <h4 id="time">10:00 PM</h4>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>