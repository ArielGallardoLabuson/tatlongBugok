<?php
include('requestfunc.php');

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/requesttable.css">
    <link rel="stylesheet" href="../design/certificate.css">
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
                <a href="requesttable.php" style="background-color: rgb(238, 227, 227);" class="hyperlink">Request Records</a>
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
            <div class="hero1">
                <div class="certificate" id="cert">
                    <p class="header">Republic of the Philippines <br>
                        Province of Bulacan <br>
                        Municipality of Pulilan <br>
                        <b>BARANGAY STO. CRISTO</b> <br>
                        Telephone No. (044)760-1205
                    </p>
                    <br><br>
                    <img id="set" src="../images/under.png" alt="">
                    <br>
                    <center>
                        <p id="punong">OFFICE OF THE PUNONG BARANGAY <br>
                            <u>CERTIFICATE OF INDIGENCY</u>
                        </p>
                    </center>
                    <br><br>
                    <p id="front">To Whom It May Concern:
                        <br><br>
                    <p id="name1"> </p>
                    <br><br>
                    This Assistance request is for:
                    <br><br>
                    &emsp;<span id="medical"></span> Medical Assistance <br>
                    &emsp;<span id="burial"></span> Burial Assistance <br>
                    &emsp;<span id="hospital"></span> Hospital Bill <br>
                    &emsp;<span id="educ"></span> Educational Assistance <br>
                    &emsp;<span id="legal"></span> Legal Assistance (PAO) <br>
                    &emsp;<span id="Others"></span> Others <br><br>



                    This Certification is issued upon the request of the above-named for legal Purposes.
                    <p id="date"> </p>,

                    <br>
                    <br>
                    <br>
                    <br>
                    <b>DENNIS M. CRUZ</b> <br>
                    Punong Barangay

                    </p>
                    <button onclick="Export2Doc('cert')">download</button>
                </div>

            </div>
            <div class="heroclearance">
                <div class="clearance">
                <p class="header">Republic of the Philippines <br>
                        Province of Bulacan <br>
                        Municipality of Pulilan <br>
                        <b>BARANGAY STO. CRISTO</b> <br>
                        Telephone No. (044)760-1205
                    </p>
                    <br>
                    <p>________________________________________________________________________________</p>
                    <br>
                    <center>
                        <p id="punong1">OFFICE OF THE BARANGAY CHAIRMAN</p> <br>
                            <p class="clear">BARANGAY CLEARANCE</p>
                        
                    </center>
                    <br><br>
                    <p id="front">To Whom It May Concern:
                        <br><br>
                    <p id="name1"> </p>
                    <br><br>
                    This Assistance request is for:
                    <br><br>
                    &emsp;<span id="medical"></span> Medical Assistance <br>
                    &emsp;<span id="burial"></span> Burial Assistance <br>
                    &emsp;<span id="hospital"></span> Hospital Bill <br>
                    &emsp;<span id="educ"></span> Educational Assistance <br>
                    &emsp;<span id="legal"></span> Legal Assistance (PAO) <br>
                    &emsp;<span id="Others"></span> Others <br><br>



                    This Certification is issued upon the request of the above-named for legal Purposes.
                    <p id="date"> </p>,

                    <br>
                    <br>
                    <br>
                    <br>
                    <b>DENNIS M. CRUZ</b> <br>
                    Punong Barangay

                    </p>
                    <button onclick="Export2Doc('cert')">download</button>
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
                    <button class="requestadd">Add Officials/Staff</button>
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
                            <th>Request Status</th>
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
                            <?php echo $result['requeststatus']; ?>
                        </td>
                        <td class="tablerow">
                            <?php echo $result['assistancerequest']; ?>
                        </td>
                        <td> <button class="requestedit">print</button>
                         <button id="requestarchive">Archive</button> </td>

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
    function Export2Doc(element, filename = '') {
        //  _html_ will be replace with custom html
        var meta = "Mime-Version: 1.0\nContent-Base: " + location.href + "\nContent-Type: Multipart/related; boundary=\"NEXT.ITEM-BOUNDARY\";type=\"text/html\"\n\n--NEXT.ITEM-BOUNDARY\nContent-Type: text/html; charset=\"utf-8\"\nContent-Location: " + location.href + "\n\n<!DOCTYPE html>\n<html>\n_html_</html>";
        //  _styles_ will be replaced with custome css
        var head = "<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<style>\n_styles_\n</style>\n</head>\n";

        var html = document.getElementById(element).innerHTML;

        var blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });

        var css = (
            '<style>' +
            ' img {width:300px;}table {border-collapse: collapse; border-spacing: 0;}td{padding: 6px;} .header{text-align: center;}#punong,u{font-size: 24px; font-weight: 700; font-family: "Inria Serif", serif;} #front{text-align: start; font-size: 15px;}' +

            '</style>'
        );
        //  Image Area %%%%
        var options = { maxWidth: 624 };
        var images = Array();
        var img = $("#" + element).find("img");
        for (var i = 0; i < img.length; i++) {
            // Calculate dimensions of output image
            var w = Math.min(img[i].width, options.maxWidth);
            var h = img[i].height * (w / img[i].width);
            // Create canvas for converting image to data URL
            var canvas = document.createElement("CANVAS");
            canvas.width = w;
            canvas.height = h;
            // Draw image to canvas
            var context = canvas.getContext('2d');
            context.drawImage(img[i], 0, 0, w, h);
            // Get data URL encoding of image
            var uri = canvas.toDataURL("image/png");
            $(img[i]).attr("src", img[i].src);
            img[i].width = w;
            img[i].height = h;
            // Save encoded image to array
            images[i] = {
                type: uri.substring(uri.indexOf(":") + 1, uri.indexOf(";")),
                encoding: uri.substring(uri.indexOf(";") + 1, uri.indexOf(",")),
                location: $(img[i]).attr("src"),
                data: uri.substring(uri.indexOf(",") + 1)
            };
        }

        // Prepare bottom of mhtml file with image data
        var imgMetaData = "\n";
        for (var i = 0; i < images.length; i++) {
            imgMetaData += "--NEXT.ITEM-BOUNDARY\n";
            imgMetaData += "Content-Location: " + images[i].location + "\n";
            imgMetaData += "Content-Type: " + images[i].type + "\n";
            imgMetaData += "Content-Transfer-Encoding: " + images[i].encoding + "\n\n";
            imgMetaData += images[i].data + "\n\n";

        }
        imgMetaData += "--NEXT.ITEM-BOUNDARY--";
        // end Image Area %%

        var output = meta.replace("_html_", head.replace("_styles_", css) + html) + imgMetaData;

        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(output);


        filename = filename ? filename + '.doc' : 'document.doc';


        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {

            downloadLink.href = url;
            downloadLink.download = filename;
            downloadLink.click();
        }

        document.body.removeChild(downloadLink);
    }

    const dateObj = new Date();
    const day = dateObj.getDate();
    const month = dateObj.toLocaleString("default", { month: "long" });
    const year = dateObj.getFullYear();

    const nthNumber = (number) => {
        if (number > 3 && number < 21) return "th";
        switch (number % 10) {
            case 1:
                return "st";
            case 2:
                return "nd";
            case 3:
                return "rd";
            default:
                return "th";
        }
    };

    const date = `Given this  ${day}${nthNumber(day)}  day of ${month}  ${year} in Barangay Sto. Cristo, Pulilan, Bulacan.`;
    document.getElementById("date").innerHTML = date; // "December 23rd, 2022"
</script>

</html>