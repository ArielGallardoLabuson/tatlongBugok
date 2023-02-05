
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/dashboard.css">
    <link rel="stylesheet" href="../design/certificate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
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

        </div>

        <div class="navbar">
            <div class="notifbell">
                <img id="bell" src="../images/notifbell.png" alt="">
                <img id="set" src="../images/settings.png" alt="">

            </div>
        </div>
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
                <center><p id="punong">OFFICE OF THE PUNONG BARANGAY <br>
                    <u>CERTIFICATE OF INDIGENCY</u>
                </p></center>
                <br><br>
                <p id="front">To Whom It May Concern:
                    <br><br>
                    This is to certify that JUAN DELA CRUZ, residing in Barangay Sto. Cristo, Pulilan, Bulacan is one of
                    the indigents of our Barangay.
                    <br><br>
                    This Assistance request is for:
                    <br><br>
                    &emsp;( ) Medical Assistance <br>
                    &emsp;( ) Burial Assistance <br>
                    &emsp;( ) Hospital Bill <br>
                    &emsp;( ) Educational Assistance <br>
                    &emsp;( ) Legal Assistance (PAO) <br>
                    &emsp;( ) Others <br><br>
                    
                   

                            This Certification is issued upon the request of the above-named for legal Purposes. <br><br>
                           <p id="date"> </p>,  

                    <br>
                    <br>
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
</script>
<script>
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
document.getElementById("date").innerHTML= date; // "December 23rd, 2022"
</script>
</html>