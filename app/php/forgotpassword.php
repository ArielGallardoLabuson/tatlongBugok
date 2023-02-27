
<?php
session_start();

if ($_SESSION['status'] == 'valid') {

  echo "<script>window.location.href='announcement.php'</script>";
}
if ($_SESSION['status'] == 'valid1') {

  echo "<script>window.location.href='dashboard.php'</script>";
}
if ($_SESSION['status'] == 'valid2') {

  echo "<script>window.location.href='changepassword.php'</script>";
}
if ($_SESSION['status'] == 'valid3') {

  echo "<script>window.location.href='verify.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../design/forgotpassword.css">
    <link rel="icon" type="image/x-icon" href="../images/Sto_Cristo_logo.ico">
    <title>Barangay Management System</title>
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
    <div class="forgotpasswordform">
    <div class="forgotpasswordbox">
        <form action="" method="post">

            <h2>Verify your email</h2>
            <input type="email" class="verifyemail" name="verifyemail" placeholder="Verify email" required>
            <button type="submit" class="verifyemailbtn" name="verifyemailbtn">Verify</button>
        </form>
    </div>
    </div>
</body>
</html>