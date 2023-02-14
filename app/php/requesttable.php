<?php
include('requestfunc.php');
error_reporting(0);
if (isset($_POST['qrcode'])) {
    $qrcode = mysqli_real_escape_string($connection, $_POST['text']);
    $sqlquery1 = "SELECT * FROM `residentsdata` WHERE `qrcode` = '{$qrcode}'  ";
    $sqlresult1 = mysqli_query($connection, $sqlquery1);
    $result1 = mysqli_fetch_array($sqlresult1);


    $sqlquery = "SELECT * FROM `requestrecord` where `id#` = '{$result1['id']}' ";
    $sqlresult = mysqli_query($connection, $sqlquery);

}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/requesttable.css">
    <link rel="stylesheet" href="../design/certificate.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
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
                <a href="requesttable.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Request
                    Records</a>
                <a href="residents.php" class="hyperlink">Residents</a>
                <a href="blotterrecord.php" class="hyperlink">Blotter Records</a>
            </div>
        </div>

        <div class="navbar">
            <div class="notifbell">
                <img id="bell" src="../images/notifbell.png" alt="">
                <img id="set" src="../images/settings.png" alt="">

            </div>
        </div>
        <div class="hero">
            <div class="qrcodesearchform">
                <div class="qrcodesearchbox">

                    <div class="backvideo">
                        <img src="../images/qrcodeicon.png" alt="">
                    </div>
                    <video id="preview"></video>
                    <div class="col-md-6">
                        <label for="">SCAN HERE</label>
                        <form action="" method="post">

                            <input type="text" name="text" id="text" readonly placeholder="scan qr code">
                            <button type="submit" name="qrcode" class="qrcode" readonly>Search</button>
                        </form>

                    </div>
                </div>
            </div>
            

            <div class="requestinfo">
                <div class="requestinfobox">
                    <p id="id#"> </p>
                    <p id="name"> </p>
                    <p id="cnumber"> </p>
                    <p id="address"> </p>
                    <p id="requestpaper"> </p>
                    <p id="purpose"> </p>
                    <p id="requeststatus"> </p>
                    <p id="assistancerequest"> </p>
                </div>
            </div>
            <div class="title">
                <h2> Request Record</h2>
            </div>
            <div class="requestaddandsearch">
                <div class="addbox">
                    <button class="qrcodesearch">Search in QR</button>
                    <button class="requestdownload">Download in Excel</button>
                </div>
                <div class="searchbox">
                    <input type="text" placeholder="Search">
                    <button id="requestsearch">Search</button>
                </div>
            </div>
            <div class="requesttable">
                <div class="table">
                    <table>
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Request Paper</th>
                            <th>Purpose</th>
                            <th>Assistance Request</th>

                            <th>Option</th>
                        </tr>
                        <?php while ($result = mysqli_fetch_array($sqlresult)) { ?>


                            <tr>
                                <td class="tablerow">
                                    <?php echo $result['id#']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result['name']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result['cnumber']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result['address']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result['requestpaper']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result['purpose']; ?>
                                </td>

                                <td class="tablerow">
                                    <?php echo $result['assistancerequest']; ?>
                                </td>
                                <td class="tableoption">
                                    <button class="requestbtn" id="approve">Approve</button>
                                    <button class="requestbtn2" id="decline">Decline</button>
                                </td>
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
<script>

    const show1 = document.querySelector('.qrcodesearch')
    show1.addEventListener('click', () => {
        $('.qrcodesearchform').css("display", "flex")
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            $('.qrcodesearchform').css("display", "flex")
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            }
            else {
                alert("No cameras found!");
            }
        }).catch(function (e) {
            console.error(e);
        });
        scanner.addListener('scan', function (c) {
            document.getElementById('text').value = c;
        })

        show1.addEventListener('click', () => {
            $('.qrcodesearchform').css("display", "none")

        })

    })
    $(document).on('keyup', function (e) {
        if (e.key == "Escape") {
            window.location.href = "http://localhost/barangaymanagementsystem/app/php/requesttable.php"
        }
    })
</script>

</html>