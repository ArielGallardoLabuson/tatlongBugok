<?php
include('requestfunc.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/residents.css">
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
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Residents</a>
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
                <h2>Residents</h2>
            </div>
            <div class="resaddandsearch">
                <div class="addbox">
                    <button class="resadd">Add Officials/Staff</button>
                    <button class="resdownload">Download in Excel</button>
                    <select name="sort" id="sort">
                        <option value="all">All</option>
                        <option value="pwd">Person With Disability</option>
                        <option value="senior">Senior Citizen</option>
                        <option value="voter">Voters</option>
                    </select>
                </div>
                <div class="ressearchbox">
                    <input type="text" placeholder="Search">
                    <button id="ressearch">Search</button>
                </div>
            </div>
            <div class="residents">
                <div class="restable">
                    <table>
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Birthdate</th>
                            <th>Sex</th>
                            <th>Condition Status</th>
                            <th>Civil Status</th>
                            <th>Voter Status</th>
                            <th>Option</th>
                        </tr>
                        <?php while ($result2 = mysqli_fetch_array($sqlresult2)) { ?>
                        <tr>
                            <td><?php echo $result2['id']; ?></td>
                            <td><?php echo $result2['name']; ?></td>
                            <td><?php echo $result2['contact']; ?></td>
                            <td><?php echo $result2['address']; ?></td>
                            <td> <?php echo $result2['birthdate']; ?></td>
                            <td><?php echo $result2['sex']; ?></td>
                            <td><?php echo $result2['conditionstatus']; ?></td>
                            <td><?php echo $result2['civilstatus']; ?></td>
                            <td><?php echo $result2['voterstatus']; ?></td>
                            <td> <button id="resedit">Edit</button> <button id="resarchive">Archive</button> </td>

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