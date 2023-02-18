<?php
include('requestfunc.php');
require('./PHPMailerAutoload.php');
session_start();
$username = $_SESSION['username'];
$sqlquery2 = "SELECT * FROM `residentsdata` WHERE username = '{$username}' ";

$sqlresult2 = mysqli_query($connection, $sqlquery2);
$result = mysqli_fetch_array($sqlresult2);

if(isset($_POST['barangayclearancebtn'])){
    $purpose = mysqli_real_escape_string($connection, $_POST['purpose1']);
    $monthNum = date("m");
    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
   $date = $monthName."-".date("d")."-"."20".date("y");

    $sql = "INSERT INTO `requestrecord` (`id#`, `name`, `cnumber`, `address`, `requestpaper`, `purpose`, `requeststatus`, `assistancerequest`)
     VALUES ('{$result['id']}','{$result['name']}','{$result['contact']}','{$result['address']}','Barangay Clearance','{$purpose}','Pending','')";
    $query = mysqli_query($connection,$sql);

    $sqlhistory = "INSERT INTO `historyrecrod`(`name`, `requestpaper`, `date`, `id#`) VALUES ('{$result['name']}','Barangay Clearance','{$date}','{$result['id']}')";
    $queryhistory = mysqli_query($connection, $sqlhistory);
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
   
    $mail->Username = 'ariellabuson08@gmail.com';
    $mail->Password = 'ewvqtnnsurejlkeo';
   
    $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
    $mail->addAddress($result['email']);
    $mail->addReplyTo('ariellabuson08@gmail.com');
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $mail->Subject = 'Santo Cristo';
    $mail->Body = 'Hi Mr/Ms '.$result['name']. ' your Barangay Clearance paper is processing. The paper is pending. '. $date;
    if (!$mail->send()) {
        echo "Messege could not be sent";
    }

}

if(isset($_POST['businessclearancebtn'])){
    $purpose = mysqli_real_escape_string($connection, $_POST['purpose2']);

    $sql = "INSERT INTO `requestrecord` (`id#`, `name`, `cnumber`, `address`, `requestpaper`, `purpose`, `requeststatus`, `assistancerequest`)
     VALUES ('{$result['id']}','{$result['name']}','{$result['contact']}','{$result['address']}','Business Clearance','{$purpose}','Pending','')";
    $query = mysqli_query($connection,$sql);

    $monthNum = date("m");
    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
   $date = $monthName."-".date("d")."-"."20".date("y");
   $sqlhistory = "INSERT INTO `historyrecrod`(`name`, `requestpaper`, `date`, `id#`) VALUES ('{$result['name']}','Business Clearance','{$date}','{$result['id']}')";
   $queryhistory = mysqli_query($connection, $sqlhistory);
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'tls';
  
   $mail->Username = 'ariellabuson08@gmail.com';
   $mail->Password = 'ewvqtnnsurejlkeo';
  
   $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
   $mail->addAddress($result['email']);
   $mail->addReplyTo('ariellabuson08@gmail.com');
   $mail->isHTML(true);
   $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
   $mail->Subject = 'Santo Cristo';
   $mail->Body = 'Hi Mr/Ms '.$result['name']. ' your Business Clearance paper is processing. The paper is pending. '. $date;
   if (!$mail->send()) {
       echo "Messege could not be sent";
   }


}

if(isset($_POST['certificatebtn'])){
    $purpose = mysqli_real_escape_string($connection, $_POST['purpose3']);

    $sql = "INSERT INTO `requestrecord` (`id#`, `name`, `cnumber`, `address`, `requestpaper`, `purpose`, `requeststatus`, `assistancerequest`)
     VALUES ('{$result['id']}','{$result['name']}','{$result['contact']}','{$result['address']}','Certification','{$purpose}','Pending','')";
    $query = mysqli_query($connection,$sql);

    $monthNum = date("m");
    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
   $date = $monthName."-".date("d")."-"."20".date("y");
   $sqlhistory = "INSERT INTO `historyrecrod`(`name`, `requestpaper`, `date`, `id#`) VALUES ('{$result['name']}','Certification','{$date}','{$result['id']}')";
   $queryhistory = mysqli_query($connection, $sqlhistory);
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'tls';
  
   $mail->Username = 'ariellabuson08@gmail.com';
   $mail->Password = 'ewvqtnnsurejlkeo';
  
   $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
   $mail->addAddress($result['email']);
   $mail->addReplyTo('ariellabuson08@gmail.com');
   $mail->isHTML(true);
   $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
   $mail->Subject = 'Santo Cristo';
   $mail->Body = 'Hi Mr/Ms '.$result['name']. ' your Certification paper is processing. The paper is pending. '. $date;
   if (!$mail->send()) {
       echo "Messege could not be sent";
   }

}

if(isset($_POST['barangayindigencybtn'])){
    $purpose = mysqli_real_escape_string($connection, $_POST['purpose4']);
    $assistance = mysqli_real_escape_string($connection, $_POST['assistrequest']);
    $sql = "INSERT INTO `requestrecord` (`id#`, `name`, `cnumber`, `address`, `requestpaper`, `purpose`, `requeststatus`, `assistancerequest`)
     VALUES ('{$result['id']}','{$result['name']}','{$result['contact']}','{$result['address']}','Certificate of Indigency','{$purpose}','Pending','{$assistance}')";
    $query = mysqli_query($connection,$sql);

    $monthNum = date("m");
    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
   $date = $monthName."-".date("d")."-"."20".date("y");
   $sqlhistory = "INSERT INTO `historyrecrod`(`name`, `requestpaper`, `date`, `id#`) VALUES ('{$result['name']}','Barangay Indigency','{$date}','{$result['id']}')";
   $queryhistory = mysqli_query($connection, $sqlhistory);
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'tls';
  
   $mail->Username = 'ariellabuson08@gmail.com';
   $mail->Password = 'ewvqtnnsurejlkeo';
  
   $mail->setFrom('ariellabuson08@gmail.com', 'ariel');
   $mail->addAddress($result['email']);
   $mail->addReplyTo('ariellabuson08@gmail.com');
   $mail->isHTML(true);
   $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
   $mail->Subject = 'Santo Cristo';
   $mail->Body = 'Hi Mr/Ms '.$result['name']. ' your Barangay Indigency paper is processing. The paper is pending. '. $date;
   if (!$mail->send()) {
       echo "Messege could not be sent";
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
    <link rel="stylesheet" href="../design/announcement.css">
    <link rel="stylesheet" href="../design/requestform.css">
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
        <form action="" method="post">

            <div class="barangayclearancebox">
                <div class="box">
                    <div class="header">
                        <h2>Barangay Clearance</h2>
                    </div>
                    <div class="body">
                        <h3>Purpose of request</h3>
                        <textarea name="purpose1" class="purpose" placeholder="Enter your purpose here" id="" cols="30"
                            rows="10" required></textarea>
                        <button type="submit" name="barangayclearancebtn" class="button">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="" method="post">
            <div class="businessclearancebox">
                <div class="box">
                    <div class="header">
                        <h2>Business Clearance</h2>
                    </div>
                    <div class="body">
                        <h3>Purpose of request</h3>
                        <textarea name="purpose2" class="purpose" placeholder="Enter your purpose here" id="" cols="30"
                            rows="10" required></textarea>
                        <button type="submit" name="businessclearancebtn" class="button">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="" method="post">
            <div class="certificationbox">
                <div class="box">
                    <div class="header">
                        <h2>Certificate</h2>
                    </div>
                    <div class="body">
                        <h3>Purpose of request</h3>
                        <textarea name="purpose3" class="purpose" placeholder="Enter your purpose here" id="" cols="30"
                            rows="10" required></textarea>
                        <button type="submit" name="certificatebtn" class="button">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="" method="post">
            <div class="barangayindigencybox">
                <div class="box">
                    <div class="header">
                        <h2>Barangay Indigency</h2>
                    </div>
                    <div class="body1">
                        <h3>Purpose of request</h3>
                        <select name="assistrequest" id="">
                            <option value="Medical Assistance"> Medical Assistance</option>
                            <option value="Burial Assistance">Burial Assistance</option>
                            <option value="Hospital Bill">Hospital Bill</option>
                            <option value="Educational Assistance">Educational Assistance</option>
                            <option value="Hospital Bill">Legal Assistance (PAO)</option>
                            <option value="Others">Others</option>
                        </select>
                        <textarea name="purpose4" class="purpose" placeholder="Enter your purpose here" id="" cols="30"
                            rows="10" required></textarea>
                        <button type="submit" name="barangayindigencybtn" class="button">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="sidebar">
            <div class="picture">
                <img id="defaultpic" src="../images/defaultpicture.png" alt="">
                <h3>
                    <?php echo $result['name']; ?>
                </h3>
            </div>
            <a href="announcement.php" class="hyperlink">Announcement</a>
            <a href="history.php" class="hyperlink">History</a>
            <a href="requestform.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Request Form</a>
            <a href="account.php" class="hyperlink">Account</a>
            <a href="qrcode.php" class="hyperlink">QR Code</a>

        </div>

        <div class="navbar">
            <div class="logouser">
                <img id="logouser" src="../images/Sto_Cristo_logo.png" alt="">
                <h3>Barangay Management System</h3>
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
            <div class="requestformbox">
                <div class="barangayclearance">
                    <h3>Barangay Clearance</h3>
                    <button type="submit" class="button" id="barangayclearance" name="barangayclearance">CLICK
                        HERE</button>
                </div>
                <div class="businessclearance">
                    <h3>Business Clearance</h3>
                    <button type="submit" class="button" id="businessclearance" name="businessclearance">CLICK
                        HERE</button>
                </div>
                <div class="certification">
                    <h3>Certification</h3>
                    <button type="submit" class="button" id="certification" name="certification">CLICK HERE</button>
                </div>
                <div class="barangayindigency">
                    <h3>Barangay Indigency</h3>
                    <button type="submit" class="button" id="barangayindigency" name="barangayindigency">CLICK
                        HERE</button>
                </div>

            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../function/dashboardfunc.js"></script>

</html>