<?php
use Mpdf\Tag\Option;
include('requestfunc.php');
include('insertfunc.php');
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
    <link rel="stylesheet" href="../design/residents.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
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
        <div class="resident">
            <div class="residentadd">
                <form action="" method="post">
                    <div class="leftinfo">
                        <div class="personalinfo">
                            <div class="header">
                                <h4>Personal information</h4>
                            </div>
                            <div class="inputinfo">
                                <input type="text" class="personinfo" name="firstname" placeholder="Enter first name"
                                    required>
                                <input type="text" class="personinfo" name="middlename" placeholder="Enter Middle name"
                                    required>
                                <input type="text" class="personinfo" name="lastname" placeholder="Enter Last name"
                                    required>

                            </div>
                            <div class="inputcontact">
                                <div class="header">
                                    <h4>Contact information</h4>
                                </div>

                                <div class="address">
                                    <input type="text" class="cont" name="streetno" placeholder="Street No">
                                    <input type="text" class="cont" name="street" placeholder="Street">
                                    <input type="text" class="cont" name="barangay" placeholder="Barangay">
                                </div>
                                <div class="contactno">
                                    <div class="header">
                                        <h4>Cellphone Number</h4>
                                    </div>
                                    <input type="number" class="cellno" name="cellno"
                                        placeholder="Enter Cellphone Number">
                                </div>
                                <div class="sexbox">
                                    <div class="header">
                                        <h4>Sex</h4>
                                    </div>
                                    <div class="sexchoice">

                                        <input type="radio" class="inputgender" name="updateinputgender" value="Male"
                                            checked>
                                        <label for="male">Male</label>
                                        <input type="radio" class="inputgender" name="updateinputgender" value="female">
                                        <label for="Female">Female</label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                
                <div class="rightinfo">
                    <div class="header">
                        <h4 class="status">Birthday</h4>
                    </div>
                    <div class="birthdaybox">

                        <div class="brtdy">
                            <select name="month" class="birthday">
                                <option value="january">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <select name="day" class="birthday">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select class="birthday" name="year">
                                <option value="1940">1940</option>
                                <option value="1941">1941</option>
                                <option value="1942">1942</option>
                                <option value="1943">1943</option>
                                <option value="1944">1944</option>
                                <option value="1945">1945</option>
                                <option value="1946">1946</option>
                                <option value="1947">1947</option>
                                <option value="1948">1948</option>
                                <option value="1949">1949</option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="header">
                        <h4 class="status">Personal Status</h4>
                    </div>
                    <div class="personalstatus">
                        <div class="conditionstatus">
                            <h5>Condition Status</h5>
                            <select name="condition">
                                <option value="Normal">Normal</option>
                                <option value="PWD">Person with Disability</option>
                                <option value="Senior Citizen">Senior Citizen</option>

                            </select>
                        </div>
                        <div class="civiltatus">
                            <h5>Civil Status</h5>
                            <select name="civil">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="voterstatus">
                            <h5>Voter Status</h5>
                            <select name="voter">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="resbtn">
                        <button type="submit" class="btn" name="btn">Add Resident</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
        <div class="sidebar">

            <div class="logo">
                <img src="../images/Sto_Cristo_logo.png" alt="">
                <h4 id="bar">Barangay Sto. Cristo, Pulilan</h4>
            </div>
            <div class="links">
                <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Residents</a>
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
                <h2>Residents</h2>
            </div>
            <div class="resaddandsearch">
                <div class="addbox">
                    <button class="resadd">Add Residents</button>
                    <button class="resdownload">Download in Excel</button>
            <form action="" method="post">

                <?php

$consql = "SELECT *  FROM `residentsdata` GROUP BY conditionstatus ";
$conquery = mysqli_query($connection,$consql);

echo ' <select name="sort" id="sort">
<option id"all" name="all" value="Sort By">Sort By '; if(isset($_POST['consubmit'])){echo $value;} echo'</option>
<option id"all" name="all" value="All">All</option>
';
while($conresult = mysqli_fetch_array($conquery)){ 
    echo'<option class="option" name="all" value="'.$conresult['conditionstatus'].'">'.$conresult['conditionstatus'].'</option>
    ';}echo '
    </select>';
    
    ?>    
    <button type="submit" class="consubmit" name="consubmit">Submit</button>
</form>      
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
                                <td>
                                    <?php echo $result2['id']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['name']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['contact']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['address']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['birthdate']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['sex']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['conditionstatus']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['civilstatus']; ?>
                                </td>
                                <td>
                                    <?php echo $result2['voterstatus']; ?>
                                </td>
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