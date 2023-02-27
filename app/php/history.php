<?php
include('requestfunc.php');
session_start();
$username = $_SESSION['username'];
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}
if ($_SESSION['status'] == 'valid1') {

    echo "<script>window.location.href='dashboard.php'</script>";

}
if ($_SESSION['status'] == 'valid2') {

    echo "<script>window.location.href='changepassword.php'</script>";
}
if ($_SESSION['status'] == 'valid3') {

    echo "<script>window.location.href='verify.php'</script>";
}

$sqlquery2 = "SELECT * FROM `residentsdata` WHERE username = '{$username}'  or email = '{$username}' ";
$sqlresult2 =  mysqli_query($connection, $sqlquery2);
$result = mysqli_fetch_array($sqlresult2);

$sqlhistory = "SELECT * FROM `historyrecrod` WHERE `id#` = '{$result['id']}' ORDER BY `queue` desc";
$queryhistory = mysqli_query($connection, $sqlhistory);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/announcement.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <link rel="stylesheet" href="../design/history.css">
    <title>Barangay Sto. Cristo, Pulilan</title>
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
    
    <div class="settings">
        <a href="logout.php">Log Out</a>
    </div>
</div>
<div class="main">
    <div class="sidebar">
        <div class="picture">
            <img id="defaultpic" src="../images/defaultpicture.png" alt="">
            <h3><?php echo $result['name'];?></h3>
        </div>
        <a href="announcement.php" class="hyperlink">Announcement</a>
        <a href="history.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">History</a>
        <a href="requestform.php" class="hyperlink">Request Form</a>
        <a href="account.php" class="hyperlink">Account</a>
        <a href="qrcode.php" class="hyperlink">QR Code</a>

    </div>

    <div class="navbar">
        <div class="logouser">
            <img id="logouser" src="../images/Sto_Cristo_logo.png" alt="">
            <h3>Barangay Sto. Cristo, Pulilan</h3>
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
        <div class="historybox">
            <h2>History</h2>
            <?php while($result1 = mysqli_fetch_array($queryhistory)){?>
            <div class="tranachistory">
                <div class="title">
                    <h3><?php echo $result1['requestpaper'] ?></h3> 
                </div>
                <div class="body">
                    <p> <?php echo $result1['name'] ?> <?php echo $result1['message'] ?></p>
                </div>
                <div class="historydate">
                    <p><?php echo $result1['date'] ?></p>
                </div>
            </div> 
            <?php }?>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>

