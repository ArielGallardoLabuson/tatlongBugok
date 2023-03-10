<?php
include('requestfunc.php');
session_start();
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}
if ($_SESSION['status'] == 'valid') {

    echo "<script>window.location.href='announcement.php'</script>";

}
if ($_SESSION['status'] == 'valid2') {

    echo "<script>window.location.href='changepassword.php'</script>";
}
if ($_SESSION['status'] == 'valid3') {

    echo "<script>window.location.href='verify.php'</script>";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <link rel="stylesheet" href="../design/household.css">
    <link rel="stylesheet" href="../design/blotterrecord.css">
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

        <div class="logo">
            <img src="../images/Sto_Cristo_logo.png" alt="">
            <h4 id="bar">Barangay Sto. Cristo, Pulilan</h4>
            </div>
            <div class="links">
            <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Households</a>
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
                <h2>Household</h2>
            </div>
            <div class="houseaddandsearch">
                <div class="addbox">
                    <button class="houseadd">Add Household</button>
                    <button class="housedownload">Download in Excel</button>
                </div>
                <div class="housesearchbox">
                    <input type="text" placeholder="Search"name="searchbox1" id="searchbox1" value="<?php if (isset($_POST['searchbtn'])) {
                            echo $searchbox;
                        }
                        
                        ?>">
                    <button id="housesearch">Search</button>
                </div>
            </div>
            <div class="household">
                <div class="housetable">
                    <table>
                        <tr>
                            <th>House #</th>
                            <th>Purok</th>
                            <th>Street</th>
                            <th>Members</th>
                            <th>Option</th>
                        </tr>
                        <?php while ($result1 = mysqli_fetch_array($sqlresult3)) { ?>
                        <tr>
                            <td><?php echo $result1['house#']; ?></td>
                            <td><?php echo $result1['purok']; ?></td>
                            <td><?php echo $result1['street']; ?></td>
                            <td><?php echo $result1['members']; ?></td>
                            <td> <button id="houseedit">Edit</button> <button id="housearchive">Archive</button> </td>

                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>