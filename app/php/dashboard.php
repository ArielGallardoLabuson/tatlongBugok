<?php
include 'connection.php';
session_start();
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}

$query = "SELECT COUNT(*) AS count FROM `requestrecord`";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result) ){
    $output = $row['count'];
}

$query1 = "SELECT COUNT(*) AS count FROM `officialsandstaff`";
$result1 = mysqli_query($connection,$query1);

while($row1 = mysqli_fetch_assoc($result1) ){
    $output1 = $row1['count'];
}

$query2 = "SELECT COUNT(*) AS count FROM `residentsdata` WHERE conditionstatus = 'PWD' ";
$result2 = mysqli_query($connection,$query2);

while($row2 = mysqli_fetch_assoc($result2) ){
    $output2 = $row2['count'];
}

$query3 = "SELECT COUNT(*) AS count FROM `residentsdata` WHERE conditionstatus = 'Senior Citizen' ";
$result3 = mysqli_query($connection,$query3);

while($row3 = mysqli_fetch_assoc($result3) ){
    $output3 = $row3['count'];
}
$query4 = "SELECT COUNT(*) AS count FROM `residentsdata` WHERE voterstatus = 'Yes' ";
$result4 = mysqli_query($connection,$query4);

while($row4 = mysqli_fetch_assoc($result4) ){
    $output4 = $row4['count'];
}

$query5 = "SELECT COUNT(*) AS count FROM `residentsdata` ";
$result5 = mysqli_query($connection,$query5);

while($row5 = mysqli_fetch_assoc($result5) ){
    $output5 = $row5['count'];
}

$query6 = "SELECT COUNT(*) AS count FROM `householddata` ";
$result6 = mysqli_query($connection,$query6);

while($row6 = mysqli_fetch_assoc($result6) ){
    $output6 = $row6['count'];
}

$query7 = "SELECT COUNT(*) AS count FROM `blotterrecord` ";
$result7 = mysqli_query($connection,$query7);

while($row7 = mysqli_fetch_assoc($result7) ){
    $output7 = $row7['count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Sto. Cristo, Pulilan</title>
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
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
            <h4>Barangay Sto. Cristo, Pulilan</h4>
            </div>
            <div class="links">
                <a href="dashboard.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
                <a href="blotterrecord.php" class="hyperlink">Blotter Records</a>
                <a href="announcementsandevents.php" class="hyperlink">Announcements & Events</a>
                <a href="eventattendee.php" class="hyperlink">Event Attendees</a>

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
                <h2>Dashboard</h2>
            </div>
            <div class="boardbox">
                <div id="totalresidents" class="box">
                    <div class="counter">
                        <h1>
                        <?php echo $output5?>
                        </h1>
                    </div>
                    <img src="../images/residents.png" alt="">
                    <div class="description">
                        <h3>
                            Total Residents
                        </h3>
                    </div>
                </div>
                <div id="totalblotter" class="box">
                    <div class="counter">
                        <h1><?php echo $output7?></h1>
                    </div>
                    <img src="../images/case.png" alt="">
                    <div class="description">
                        <h3>
                            Total blotters
                        </h3>
                    </div>
                </div>
                <div id="certificates" class="box">
                    <div class="counter">
                        <h1><?php echo $output?></h1>
                    </div>
                    <img src="../images/cert.png" alt="">
                    <div class="description">
                        <h3>
                            Certificates/Clearances <br> and Permits
                        </h3>
                    </div>

                </div>
                <div id="barangayofficials" class="box">
                    <div class="counter">
                        <h1><?php echo $output1?></h1>
                    </div>
                    <img src="../images/brgyoff.png" alt="">
                    <div class="description">
                        <h3>
                            Barangay Officials
                        </h3>
                    </div>
                </div>
                <div id="pwds" class="box">
                    <div class="counter">
                        <h1><?php echo $output2?></h1>
                    </div>
                    <img src="../images/pwd.png" alt="">
                    <div class="description">
                        <h3>
                            Total Person With Disabilities
                        </h3>
                    </div>
                </div>
                <div id="senior" class="box">
                    <div class="counter">
                        <h1><?php echo $output3?></h1>
                    </div>
                    <img src="../images/senior.png" alt="">
                    <div class="description">
                        <h3>
                            Total Senior Citizens
                        </h3>
                    </div>
                </div>
                <div id="voters" class="box">
                    <div class="counter">
                        <h1><?php echo $output4?></h1>
                    </div>
                    <img src="../images/voters.png" alt="">
                    <div class="description">
                        <h3>
                            Total Voters
                        </h3>
                    </div>
                </div>
                <div id="household" class="box">
                    <div class="counter">
                        <h1><?php echo $output6?></h1>
                    </div>
                    <img src="../images/household.png" alt="">
                    <div class="description">
                        <h3>
                            Total Households
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php

?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="../function/dashboardfunc.js"></script>
</html>