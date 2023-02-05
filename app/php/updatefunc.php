<?php
include('connection.php');
if(isset($_POST['updateofficials'])){
    $officialid = mysqli_real_escape_string($connection, $_POST['officialid']);
    $position = mysqli_real_escape_string($connection, $_POST['position']);
    $fullname = mysqli_real_escape_string($connection, $_POST['fname']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $start = mysqli_real_escape_string($connection, $_POST['start']);
    $end = mysqli_real_escape_string($connection, $_POST['end']);
    
    $officialsql = "UPDATE `officialsandstaff` set `position` = '{$position}', `name` = '{$fullname}', `contact` = '{$contact}', `address` = '{$address}', `startofterm` = '{$start}', `endofterm`='{$end}' WHERE `id` = '{$officialid}'";    
    $rofficialesult = mysqli_query($connection, $officialsql);
    echo ' <script> window.location.href=("http://localhost/barangaymanagementsystem/app/php/officialsandstaff.php")</script>';
    return;
}

?>