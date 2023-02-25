<?php
session_start();

$_SESSION['status'] = 'invalid';
$_SESSION['status1'] = 'invalid';
unset($_SESSION['email']);
unset($_SESSION['username']);
echo "<script>window.location.href='login.php'</script>";
?>