<?php
include('requestfunc.php');
include('insertfunc.php');
include('updatefunc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/officialsandstaff.css">
    <link rel="stylesheet" href="../design/blotterrecord.css">
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
            </div>
            <div class="links">
                <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
                <a href="blotterrecord.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Blotter
                    Records</a>
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
                <div class="addofficialsbox" id="addofficialsbox">
                    <div class="title">
                        <h2>Add Blotter Record</h2>
                    </div>
                    <form action="" method="POST">
                        <div class="complainant">
                            <h4>Complainant Information</h4>
                            <div class="cominformation1">
                                <input type="text" id="complainant" class="recordinput" name="complainant"
                                    placeholder="Complainant">
                                <input type="text" id="address" class="recordinput" name="address" placeholder="Address"
                                    required>
                            </div>
                            <div class="cominformation2">
                                <input type="text" id="age" name="age" class="recordinput" placeholder="Age" required>
                                <input type="text" id="contact" class="recordinput" name="contact" placeholder="Contact"
                                    required>
                            </div>
                        </div>
                        <div class="complaianee">
                            <h4>Complainanee Information</h4>
                            <div class="cominformation1">
                                <input type="text" id="complainanee" class="recordinput" name="complainanee"
                                    placeholder="Complainanee" required>
                                <input type="text" id="address1" class="recordinput" name="address1"
                                    placeholder="Address" required>
                            </div>
                            <div class="cominformation2">
                                <input type="text" id="age1" class="recordinput" name="age1" placeholder="Age" required>
                                <input type="text" id="contact1" class="recordinput" name="contact1"
                                    placeholder="Contact" required>
                            </div>
                        </div>
                        <div class="complaint">

                            <h4>Complaint</h4>
                            <div class="cominformation1">

                                <input type="text" id="complaint" class="recordinput" name="complaint"
                                    placeholder="Complaint" required>

                                <input type="text" id="incidence" class="recordinput" name="incidence"
                                    placeholder="Incidence" required>
                            </div>
                            <div class="cominformation2">
                                <div class="recordstatus">

                                    <select name="action" id="">
                                        <option value="1st Option">1st Option</option>
                                        <option value="2nd Option">2nd Option</option>
                                        <option value="3rd Option">3rd Option</option>
                                        <option value="4th Option">4th Option</option>
                                        <option value="5th Option">5th Option</option>
                                    </select>
                                    <h4>Action</h4>
                                </div>
                                <div class="recordstatus">

                                    <select name="status" id="">
                                        <option value="Solve">Solve</option>
                                        <option value="Unsolve">Unsolve</option>
                                    </select>
                                    <h4>Status</h4>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="blotterrecord" class="blotterrecord">Done</button>
                    </form>
                </div>
            </div>
            <div class="title">
                <h2>Blotter Record</h2>
            </div>
            <div class="addandsearch">
                <div class="addbox">
                    <button id="officialbutton" class="add">Add Blotter Record </button>
                    <button class="download">Download Data Table</button>
                </div>
                <div class="searchbox">
                    <form action="" id="searchbox" method="post">

                        <input type="text">
                        <button id="search" name="recordsearchbtn">Search</button>
                    </form>
                </div>
            </div>
            <div class="officialtable">
                <div class="table">
                    <table>
                        <tr>
                            <th>Date recorded</th>
                            <th>Complainant</th>
                            <th>Person To Complain</th>
                            <th>Complaint</th>
                            <th>Action Taken</th>
                            <th>Status</th>
                            <th>Location Of Incidence</th>
                            <th>Option</th>
                        </tr>
                        <?php while ($result4 = mysqli_fetch_array($sqlresult4)) { ?>
                            <tr>
                                <td>
                                    <?php echo $result4['date']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['complainant']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['complainanee']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['complaint']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['action']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['status']; ?>
                                </td>
                                <td>
                                    <?php echo $result4['incidence']; ?>
                                </td>

                                <td> <button type="submit" id="edit" name="edit">Edit</button> <button
                                        id="archive">Archive</button> </td>
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