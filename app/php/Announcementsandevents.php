<?php
include('connection.php');
$monthNum = date("m");
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
$date = $monthName."-".date("d")."-"."20".date("y");

if(isset($_POST['announcementbtn'])){

    $subject = mysqli_real_escape_string($connection,$_POST['subjecttxt'] );
    $body = mysqli_real_escape_string($connection,$_POST['bodytxt'] );
    $sql = "INSERT INTO `announcementrecord`(`date`, `subject`, `body`, `admin`) VALUES ('{$date}','{$subject}','{$body}','Sto. Cristo Management')";
    $query = mysqli_query($connection, $sql);
}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <div class="logo">
                <img src="../images/Sto_Cristo_logo.png" alt="">
                <h4 id="bar">Barangay Management System</h4>
                <link rel="stylesheet" href="../design/dashboard.css">
                <link rel="stylesheet" href="../design/announcementsandevents.css">
            </div>
            <div class="links">
                <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
                <a href="blotterrecord.php" class="hyperlink">Blotter Records</a>
                <a href="announcementsandevents.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Announcements & Events</a>
            </div>
        </div>

        <div class="navbar">
            <div class="notifbell">
                <img id="bell" src="../images/notifbell.png" alt="">
                <img id="set" src="../images/settings.png" alt="">

            </div>
        </div>
        <div class="hero">
        <div class="title">
                <h2>Announcements & Events</h2>
            </div>
            <div class="announcementform">

                <div class="announcementbox">
                    <h2>Announcements</h2>
                    <form action="" method="post">

                        <div class="subject">
                            <h4>Subject:</h4>
                            <input type="text" class="subjecttxt" name="subjecttxt" placeholder="Subject" required>
                        </div>
                        <div class="body">
                            <h4>Body:</h4>
                            <textarea name="bodytxt" id="bodytxt" cols="30" rows="10" placeholder="Enter here"></textarea>
                        </div>
                        <button type="submit" name="announcementbtn">Create Announcement</button>
                    </form>
                    </div>
                </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="../function/dashboardfunc.js"></script>
</html>