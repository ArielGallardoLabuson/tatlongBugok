<?php
include('requestfunc.php');
session_start();
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}
$username = $_SESSION['username'];
$sqlquery2 = "SELECT * FROM `residentsdata` WHERE username = '{$username}' or email = '{$username}' ";
$sqlresult2 =  mysqli_query($connection, $sqlquery2);
$result = mysqli_fetch_array($sqlresult2);
$sql = "SELECT * FROM `announcementrecord` ORDER BY id desc ";
$query = mysqli_query($connection, $sql);

$sqlevent = "SELECT * FROM `eventsrecord` ORDER BY id desc ";
$queryevent = mysqli_query($connection, $sqlevent);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/announcement.css">
    <link rel="stylesheet" href="../design/loader.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <title>Barangay Sto. Cristo, Pulilan</title>
</head>

<body>
<div class="loader"></div>
    <div class="notifbox">
        <h1>Notifications</h1>
    </div>
    <div class="setbox">
        <h1>Settings</h1>
    </div>
    <div class="main">
        <div class="sidebar">
            <div class="picture">
                <img id="defaultpic" src="../images/defaultpicture.png" alt="">
                <h3>
                    <?php echo $result['name']; ?>
                </h3>
            </div>
            <a href="announcement.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Announcement</a>
            <a href="history.php" class="hyperlink">History</a>
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
            <div class="eventform">
                <div class="eventboxx">
                <p>
                            Sto. Cristo Management</p>
                    <div class="eventesubject">
                        <h2>
                        <?php
                            if (isset($_POST['show1'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['eventidentify']);
                                $sql = "SELECT * FROM `eventsrecord` WHERE `id` = $id";
                                $query = mysqli_query($connection, $sql);

                                $result = mysqli_fetch_array($query);
                                echo $result['subject'];
                            }
                            ?>
                        </h2>

                    </div>
                    <div class="eventdate">
                        <h3>Date</h3>
                        <p>
                            <?php
                            if (isset($_POST['show1'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['eventidentify']);
                                $sql = "SELECT * FROM `eventsrecord` WHERE `id` = $id";
                                $query = mysqli_query($connection, $sql);

                                $result = mysqli_fetch_array($query);
                                echo $result['month']." ".$result['day'].", "."20".$result['year'];
                            }
                            ?>

                        </p>
                        <h3>Time</h3>
                        
                        <p><?php
                            if (isset($_POST['show1'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['eventidentify']);
                                $sql = "SELECT * FROM `eventsrecord` WHERE `id` = $id";
                                $query = mysqli_query($connection, $sql);

                                $result = mysqli_fetch_array($query);
                                echo $result['time'];
                            }
                            ?></p>
                    </div>
                    <div class="eventbody">
                        <div class="eventbodychild">
                            <p>
                            <?php
                            if (isset($_POST['show1'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['eventidentify']);
                                $sql = "SELECT * FROM `eventsrecord` WHERE `id` = $id";
                                $query = mysqli_query($connection, $sql);

                                $result = mysqli_fetch_array($query);
                                echo $result['body'];
                            }
                            ?>
                            </p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="announcementform">
                <div class="announcementbox">
                    <div class="titleanddate">
                   
                        <h2>
                            <?php
                            if (isset($_POST['show'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['id']);
                                $sql = "SELECT * FROM `announcementrecord` where `id` = '{$id}'  ";
                                $query = mysqli_query($connection, $sql);
                                $result = mysqli_fetch_array($query);
                                echo $result['subject'];

                                ?>
                            </h2>
                            <p>
                                <?php echo $result['date']; ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="bodyandadnmin">
                        <p class="parag">
                            <?php
                            if (isset($_POST['show'])) {
                                $id = mysqli_real_escape_string($connection, $_POST['id']);
                                $sql = "SELECT * FROM `announcementrecord` where `id` = '{$id}'  ";
                                $query = mysqli_query($connection, $sql);
                                $result = mysqli_fetch_array($query);
                                echo $result['body'];

                                ?>
                            </p>

                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="announcements">
                <div class="header">
                    <h2>Announcements</h2>
                </div>
                <?php while ($result = mysqli_fetch_array($query)) { ?>
                    <div class="body">
                        <form action="" method="post">
                            <div class="content">
                                <h3>
                                    <?php echo $result['subject']; ?>
                                </h3>
                                <p class="bods">
                                    <?php echo $result['body']; ?>
                                </p>


                                <h3> <input type="hidden" class="identity" name="id" value="<?php echo $result['id']; ?>">
                                </h3>
                                <button type="submit" class="showannounce" name="show">Show more</button>
                        </form>

                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="events">
            <div class="header">
                <h2>Events</h2>
            </div>
            <?php while ($resultevent = mysqli_fetch_array($queryevent)) { ?>
                <div class="eventbox">

                    <div class="date">
                        <h4>
                            <?php echo $resultevent['month'] ?>
                        </h4>
                        <h2>
                            <?php echo $resultevent['day'] ?>
                        </h2>
                    </div>
                    <div class="what">
                        <div class="title">
                            <h2 id="title">
                                <?php echo $resultevent['subject'] ?>
                            </h2>
                        </div>
                        <div class="time">
                            <h4 id="time">
                                <?php echo $resultevent['time'] ?>
                            </h4>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="eventidentify" value="<?php echo $resultevent['id'] ?>">
                            <button type="submit" class="show1" name="show1">Show more</button>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>
<?php
if (isset($_POST['show'])) {
    echo "<script>
    $('.announcementform').css('display','flex')
</script>
    ";
}
if (isset($_POST['show1'])) {
    echo "<script>
    $('.eventform').css('display','flex')
</script>
    ";  
}
?>
<script>
    $(document).on('keyup', function (e) {

        if (e.key == "Escape") {
            window.location.href = "announcement.php"
        }
    });
</script>

<script>
      window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");
  
    loader.classList.add("loader--hidden");
  
    loader.addEventListener("transitionend", () => {
      document.body.removeChild(loader);
    });
  });
</script>
</html>