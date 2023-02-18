<?php
include('requestfunc.php');
include('insertfunc.php');
include('updatefunc.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/officialsandstaff.css">
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
            <h4>Barangay Management System</h4>
            </div>
            <div class="links">
            <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Officials and Staff</a>
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
            <div class="addofficials">
                <div class="addofficialsbox">
                    <div class="title">
                        <h2>Add Officials/Staff</h2>
                    </div>
                    <form action="" method="POST">
                    <input type="text" id="officialid" name="officialid" placeholder="Position" hidden>
                        <input type="text" id="position" name="position" placeholder="Position" required>
                        <input type="text" id="name" name="fname" placeholder="Full name" required>
                        <input type="text" id="contact" name="contact" placeholder="Contact" required>
                        <input type="text" id="address" name="address" placeholder="Address" required>
                        <span>Start of Date</span>
                        <input type="date" id="start" name="start" >
                        <span>End of Date</span>
                        <input type="date" id="end" name="end">
                        <button type="submit" name="addofficials">Done</button>
                        <button type="submit" name="updateofficials">Done</button>
                    </form>
                </div>
            </div>
            <div class="title">
                <h2>Officials and Staff</h2>
            </div>
            <div class="addandsearch">
                <div class="addbox">
                    <button id="officialbutton" class="add">Add Officials/Staff</button>
                    <button class="download">Download Data Table</button>
                </div>
                <div class="searchbox">
                    <form action="" method="post">

                        <input type="text" placeholder="Search" name="searchbox" id="searchbox" value="<?php if (isset($_POST['searchbtn'])) {
                            echo $searchbox;
                        }
                        
                        ?>" required>
                        <button id="search" name="searchbtn">Search</button>
                    </form>
                </div>
            </div>
            <div class="officialtable">
                <div class="table">
                    <table>
                        <tr>
                        <th>ID</th>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Start of Term</th>
                            <th>End of Term</th>
                            <th>Option</th>
                        </tr>
                        <?php while ($result1 = mysqli_fetch_array($sqlresult1)) { ?>
                        <tr> 
                        <td><?php echo $result1['id']; ?></td> 
                            <td><?php echo $result1['position']; ?></td>
                            <td><?php echo $result1['name']; ?></td>
                            <td><?php echo $result1['contact']; ?></td>
                            <td><?php echo $result1['address']; ?></td>
                            <td> <?php echo $result1['startofterm']; ?></td>
                            <td> <?php echo $result1['endofterm']; ?></td>
                            <td> <button type="submit" id="edit" name="editt">Edit</button> <button id="archive">Archive</button> </td>
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