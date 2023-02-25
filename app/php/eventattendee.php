<?php
include('connection.php');
session_start();
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {

    echo "<script>window.location.href='login.php'</script>";

}

$sql = "SELECT * FROM `eventsrecord` ORDER BY id desc ";
$query = mysqli_query($connection, $sql);


if (isset($_POST['add'])) {
    $qrcode = mysqli_real_escape_string($connection, $_POST['text']);
    $subject1 = mysqli_real_escape_string($connection, $_POST['subject1']);
    if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM residentsdata WHERE `qrcode` = '{$qrcode}'")) > 0) {
        $sql1 = "SELECT * FROM residentsdata WHERE `qrcode` = '{$qrcode}'";
        $query1 = mysqli_query($connection, $sql1);
        $result1 = mysqli_fetch_array($query1);
        $sql2 = "INSERT INTO `eventattendeesrecord`(`subject`, `id`, `name`, `contact`, `address`, `sex`, `conditionstatus`) VALUES ('{$subject1}','{$result1['id']}','{$result1['name']}','{$result1['contact']}','{$result1['address']}','{$result1['sex']}','{$result1['conditionstatus']}')";
        $query2 = mysqli_query($connection, $sql2);
    } else {

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/eventattendee.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>

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
            </div>
            <div class="links">
                <a href="dashboard.php" class="hyperlink">Dashboard</a>
                <a href="officialsandstaff.php" class="hyperlink">Officials and Staff</a>
                <a href="household.php" class="hyperlink">Households</a>
                <a href="requesttable.php" class="hyperlink">Request Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
                <a href="blotterrecord.php" class="hyperlink">Blotter
                    Records</a>
                <a href="announcementsandevents.php" class="hyperlink">Announcements & Events</a>
                <a href="eventattendee.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Event
                    Attendees</a>
            </div>
        </div>

        <div class="navbar">
            <div class="notifbell">
                <img id="bell" src="../images/notifbell.png" alt="">
                <img id="set" src="../images/settings.png" alt="">

            </div>
        </div>
        <div class="hero">
            <div class="addattendeesform">
                <div class="addattendeesbox">
                    <h2>Add Attendees</h2>
                        <video id="preview" width="100%">
                        
                        </video>
                        <div class="backvideo">
                        <img src="../images/qrcodeicon.png" alt="">
                    </div>
                            <label for="">SCAN HERE</label>
                            <form action="" method="post">
                                <input type="text" name="text" id="text" readonly placeholder="scan qr code"
                                    class="form-control">
                                <input type="hidden" name="subject1" value=" <?php if (isset($_POST['addattendeesbtn'])) {
                                    $subject = mysqli_real_escape_string($connection, $_POST['subject']);
                                    echo $subject;
                                } ?>">
                                <button type="submit" name="add">Add</button>
                            </form>
                        
                    
                </div>
            </div>
            <div class="attendeeesform">

                <div class="attendeesbox">
                    <?php while ($result = mysqli_fetch_array($query)) {

                        ?>

                        <div class="attendees">

                            <div class="attend">
                                <div class="total" id="totalattendees">
                                    <div class="counter">
                                        <h1>
                                            <?php $query3 = "SELECT COUNT(*) AS count FROM `eventattendeesrecord` WHERE `subject` = ' {$result['subject']}' ";
                                            $result3 = mysqli_query($connection, $query3);
                                            $row3 = mysqli_fetch_assoc($result3);
                                            echo  $output3 = $row3['count'];
                                            ?>
                                            
                                        </h1>
                                        <h4>Total Attendees</h4>
                                    </div>
                                    <img src="../images/residents.png" alt="">
                                </div>
                                <div class="total" id="totalsenior">
                                    <div class="counter">
                                        <h1>
                                        <?php $query3 = "SELECT COUNT(*) AS count FROM `eventattendeesrecord` WHERE `subject` = ' {$result['subject']}' and `conditionstatus` = 'Senior Citizen' ";
                                            $result3 = mysqli_query($connection, $query3);
                                            $row3 = mysqli_fetch_assoc($result3);
                                            echo  $output3 = $row3['count'];
                                            ?>
                                        </h1>
                                        <h4>Total Senior</h4>
                                    </div>
                                    <img src="../images/senior.png" alt="">

                                </div>
                                <div class="total" id="totalpwd">
                                    <div class="counter">
                                        <h1>
                                        <?php $query3 = "SELECT COUNT(*) AS count FROM `eventattendeesrecord` WHERE `subject` = ' {$result['subject']}' and `conditionstatus` = 'PWD' ";
                                            $result3 = mysqli_query($connection, $query3);
                                            $row3 = mysqli_fetch_assoc($result3);
                                            echo  $output3 = $row3['count'];
                                            ?>

                                        </h1>
                                        <h4>Total PWD</h4>
                                    </div>
                                    <img src="../images/pwd.png" alt="">

                                </div>
                            </div>
                            <div class="titleandaddbtn">
                                <h1>
                                    <?php echo $result['subject']; ?>
                                </h1>
                                <form action="" method="post">

                                    <Input type="hidden" name="subject" value="<?php echo $result['subject']; ?>"></Input>
                                    <button class="addattendeesbtn" name="addattendeesbtn">Add Attendees</button>
                                </form>

                            </div>
                        </div>

                    <?php } ?>
                </div>




            </div>

        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>
<?php if (isset($_POST['addattendeesbtn'])) {
    echo "<script>
        $('.addattendeesform').css('display', 'flex') 
  let scanner = new Instascan.Scanner({
  
              video: document.getElementById('preview') 
          });
              
              Instascan.Camera.getCameras().then(function(cameras){
                if(cameras.length > 0){
                    scanner.start(cameras[0]);
                }  
                else{
                  alert('No cameras found!');
                }
              }).catch(function(e){
                  console.error(e);
              });
        scanner.addListener('scan',function(c){
            document.getElementById('text').value = c;
        })
      </script>";
} ?>
<script>
    $(document).on('keyup', function (e) {

        if (e.key == "Escape") {
            window.location.href = "http://localhost/barangaymanagementsystem/app/php/eventattendee.php"
        }
    })
</script>



</html>