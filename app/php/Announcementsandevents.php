<?php
include('connection.php');
session_start();
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}
$monthNum = date("m");
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
$date = $monthName . "-" . date("d") . "-" . "20" . date("y");

if (isset($_POST['announcementbtn'])) {

    $subject = mysqli_real_escape_string($connection, $_POST['subjecttxt']);
    $body = mysqli_real_escape_string($connection, $_POST['bodytxt']);
    $sql = "INSERT INTO `announcementrecord`(`date`, `subject`, `body`, `admin`) VALUES ('{$date}','{$subject}','{$body}','Sto. Cristo Management')";
    $query = mysqli_query($connection, $sql);
}
if (isset($_POST['eventbtn'])) {

    $subject = mysqli_real_escape_string($connection, $_POST['subjecttxtevent']);
    $month = mysqli_real_escape_string($connection, $_POST['month']);
    $day = mysqli_real_escape_string($connection, $_POST['day']);
    $year = date("y");
    $hour = mysqli_real_escape_string($connection, $_POST['hour']);
    $minute = mysqli_real_escape_string($connection, $_POST['minute']);
    $ampm = mysqli_real_escape_string($connection, $_POST['ampm']);
    $body = mysqli_real_escape_string($connection, $_POST['bodytxtevent']);

    $time = $hour.":".$minute." ".$ampm;
    $sqlevent = "INSERT INTO `eventsrecord` (`month`, `day`, `year`, `subject`, `body`, `time`) VALUES ('{$month}','{$day}','{$year}','{$subject}','{$body}','$time')";
    $queryevent = mysqli_query($connection, $sqlevent);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </div>
    <div class="main">
        <div class="sidebar">

            <div class="logo">
                <img src="../images/Sto_Cristo_logo.png" alt="">
                <h4 id="bar">Barangay Sto. Cristo, Pulilan</h4>
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
                <a href="announcementsandevents.php" style="background-color: rgb(238, 227, 227);"
                    class="hyperlink">Announcements & Events</a>
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
                            <textarea name="bodytxt" id="bodytxt" cols="30" rows="10"
                                placeholder="Enter here"></textarea>
                        </div>
                        <button type="submit" name="announcementbtn">Create Announcement</button>
                    </form>
                </div>
            </div>
            <div class="announcementform">

                <div class="announcementbox" id="events">
                    <h2>Events</h2>
                    <form action="" method="post">

                        <div class="subject">
                            <h4>Subject:</h4>
                            <input type="text" class="subjecttxt" name="subjecttxtevent" placeholder="Subject" required>
                        </div>
                        <div class="body">
                            <h4>Body:</h4>
                            <textarea name="bodytxtevent" id="bodytxt" cols="30" rows="10" placeholder="Enter here"></textarea>
                        </div>
                        <div class="datebox">
                            <h4>Time:</h4>
                            <select name="hour" class="dateandtime">
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
                            </select>
                            <select name="minute" class="dateandtime">
                            <option value="00">00</option>
                            <option value="1">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
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
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                                <option value="51">51</option>
                                <option value="52">52</option>
                                <option value="53">53</option>
                                <option value="54">54</option>
                                <option value="55">55</option>
                                <option value="56">56</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                            </select>
                            <select name="ampm" id="">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                        <div class="datebox">
                            <h4>Date:</h4>
                            <select name="month" class="dateandtime">
                            <option value="January">January</option>
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
                            <select name="day" class="dateandtime">
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
                        </div>
                        
                        <button type="submit" name="eventbtn">Create Event</button>
                    </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>