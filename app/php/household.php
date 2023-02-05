<?php
include('requestfunc.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/household.css">
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
                <a href="household.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
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
                    <button class="houseadd">Add Officials/Staff</button>
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