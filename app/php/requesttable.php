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
if (isset($_POST['approve'])) {
    $iddetect = mysqli_real_escape_string($connection, $_POST['iddetect']);
    $namedetect = mysqli_real_escape_string($connection, $_POST['namedetect']);
    $cnumberdetect = mysqli_real_escape_string($connection, $_POST['cnumberdetect']);
    $addressdetect = mysqli_real_escape_string($connection, $_POST['addressdetect']);
    $requestpaperdetect = mysqli_real_escape_string($connection, $_POST['requestpaperdetect']);
    $purposedetect = mysqli_real_escape_string($connection, $_POST['purposedetect']);
    $requestdetect = mysqli_real_escape_string($connection, $_POST['requestdetect']);
    $asstancerequestdetect = mysqli_real_escape_string($connection, $_POST['asstancerequestdetect']);


}
if (isset($_POST['yes'])) {
    $iddetect1 = mysqli_real_escape_string($connection, $_POST['iddetect1']);
    $namedetect1 = mysqli_real_escape_string($connection, $_POST['namedetect1']);
    $cnumberdetect1 = mysqli_real_escape_string($connection, $_POST['cnumberdetect1']);
    $addressdetect1= mysqli_real_escape_string($connection, $_POST['addressdetect1']);
    $requestpaperdetect1 = mysqli_real_escape_string($connection, $_POST['requestpaperdetect1']);
    $purposedetect1 = mysqli_real_escape_string($connection, $_POST['purposedetect1']);
    $requestdetect1 = mysqli_real_escape_string($connection, $_POST['requestdetect1']);
    $asstancerequestdetect1 = mysqli_real_escape_string($connection, $_POST['asstancerequestdetect1']);

    $sqldetect = "INSERT INTO approvedrequestrecord (`id#`, `name`, `cnumber`, `address`, `requestpaper`, `purpose`, `requeststatus`, `assistancerequest`) VALUES ('{$iddetect1}','{$namedetect1}','{$cnumberdetect1}','{$addressdetect1}','{$requestpaperdetect1}','{$purposedetect1}','{$requestdetect1}','{$asstancerequestdetect1}')";
    $querydetect = mysqli_query($connection, $sqldetect);  
    $sqldelete = "DELETE FROM requestrecord WHERE `id#` = '{$iddetect1}'";
    $querydelete = mysqli_query($connection, $sqldelete);
    echo ' <script> window.location.href=("http://localhost/barangaymanagementsystem/app/php/requesttable.php")</script>';
   
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
        <div class="hero" id="hero">
            <div class="approveform">
                <div class="approvebox">
                    <p>Are you sure you want to approve this request?</p>
                    <div class="aprroverequestbtn">
                        <form action="" method="post">
                            <input type="hidden" name="iddetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $iddetect;
                            } ?>">
                            <input type="hidden" name="namedetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $namedetect;
                            } ?>">
                            <input type="hidden" name="cnumberdetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $cnumberdetect;
                            } ?>">
                            <input type="hidden" name="addressdetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $addressdetect;
                            } ?>">
                            <input type="hidden" name="requestpaperdetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $requestpaperdetect;
                            } ?>">
                            <input type="hidden" name="purposedetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $purposedetect;
                            } ?>">
                            <input type="hidden" name="requestdetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $requestdetect;
                            } ?>"><input type="hidden" name="asstancerequestdetect1" value="<?php if (isset($_POST['approve'])) {
                                echo $asstancerequestdetect;
                            } ?>">
                            
                            <button type="submit" class="yes" name="yes">Yes</button>
                        </form>
                        <button class="no">No</button>
                    </div>
                </div>
            </div>
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
                                    <form action="" method="post">
                                        <input type="hidden" name="iddetect" value="<?php echo $result['id#'] ?>">
                                        <input type="hidden" name="namedetect" value="<?php echo $result['name'] ?>">
                                        <input type="hidden" name="cnumberdetect" value="<?php echo $result['cnumber'] ?>">
                                        <input type="hidden" name="addressdetect" value="<?php echo $result['address'] ?>">
                                        <input type="hidden" name="requestpaperdetect"
                                            value="<?php echo $result['requestpaper'] ?>">
                                        <input type="hidden" name="purposedetect" value="<?php echo $result['purpose'] ?>">
                                        <input type="hidden" name="requestdetect"
                                            value="<?php echo $result['requeststatus'] ?>">
                                        <input type="hidden" name="asstancerequestdetect"
                                            value="<?php echo $result['assistancerequest'] ?>">



                                        <button type="submit" class="requestbtn approve" name="approve"
                                            id="approve">Approve</button>
                                    </form>
                                    <button class="requestbtn2" id="decline">Decline</button>
                                </td>

                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
            <div class="title">
                <h2>Approved Request Record</h2>
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

                        </tr>
                        <?php while ($result5 = mysqli_fetch_array($sqlresult5)) { ?>


                            <tr>

                                <td class="tablerow">
                                    <?php echo $result5['id#']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['name']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['cnumber']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['address']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['requestpaper']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['purpose']; ?>
                                </td>

                                <td class="tablerow">
                                    <?php echo $result5['assistancerequest']; ?>
                                </td>

                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
            <div class="title">
                <h2>Declined Request Record</h2>
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

                        </tr>
                        <?php while ($result5 = mysqli_fetch_array($sqlresult5)) { ?>


                            <tr>

                                <td class="tablerow">
                                    <?php echo $result5['id#']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['name']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['cnumber']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['address']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['requestpaper']; ?>
                                </td>
                                <td class="tablerow">
                                    <?php echo $result5['purpose']; ?>
                                </td>

                                <td class="tablerow">
                                    <?php echo $result5['assistancerequest']; ?>
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
<?php
if (isset($_POST['approve'])) {


    echo "<script>
    $('.approve').ready(function () {
        $('.approveform').css('display', 'flex')
    })
    </script>
";
}
?>
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