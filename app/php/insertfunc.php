<?php
include('connection.php');


if(isset($_POST['addofficials'])){
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $name = mysqli_real_escape_string($connection, $_POST['fname']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $start = mysqli_real_escape_string($connection, $_POST['start']);
    $end = mysqli_real_escape_string($connection, $_POST['end']);

    $officialsql = "INSERT INTO `officialsandstaff`(`position`, `name`, `contact`, `address`, `startofterm`, `endofterm`) VALUES ('{$position}','{$name}','{$contact}','{$address}','{$start}','{$end}')";
    $rofficialesult = mysqli_query($connection, $officialsql);
    echo ' <script> window.location.href=("http://localhost/barangaymanagementsystem/app/php/officialsandstaff.php")</script>';
    return;
}

?>