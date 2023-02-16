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

if (isset($_POST['btn'])) {
    $id = "2023".(rand(100,10000));
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($connection, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $name = $firstname." ". $middlename." ".$lastname;

    $streetno = mysqli_real_escape_string($connection, $_POST['streetno']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $barangay = mysqli_real_escape_string($connection, $_POST['barangay']);
    $address = $streetno . " " .$street  . " " . $barangay;
    
    $cellno = mysqli_real_escape_string($connection, $_POST['cellno']);
    $updateinputgender = mysqli_real_escape_string($connection, $_POST['updateinputgender']);
    $month = mysqli_real_escape_string($connection, $_POST['month']);
    $day = mysqli_real_escape_string($connection, $_POST['day']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $birthday = $month." ".$day.", ".$year;
    $condition = mysqli_real_escape_string($connection, $_POST['condition']);
    $civil = mysqli_real_escape_string($connection, $_POST['civil']);
    $voter = mysqli_real_escape_string($connection, $_POST['voter']);
    $username = trim($id);
    $password = md5($id.$year); 
    $qrcode = md5("2023".(rand(100,10000)));
    $ressql = "INSERT INTO residentsdata (`id`, `name`, `contact`, `address`, `birthdate`, `sex`, `conditionstatus`, `civilstatus`, `voterstatus`, `username`, `password`,`loginattempt`,`email`, `qrcode`) VALUES ('{$id}','{$name}','{$cellno}','{$address}','{$birthday}','{$updateinputgender}','{$condition }','{$civil}','{$voter}','{$username}','{$password}',0,'','{$qrcode}')";
    $resquery = mysqli_query($connection, $ressql);
    echo ' <script> window.location.href=("http://localhost/barangaymanagementsystem/app/php/residents.php")</script>';
    return;
}

if(isset($_POST['blotterrecord'])){
    $complainant = mysqli_real_escape_string($connection, $_POST['complainant']);

    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $age = mysqli_real_escape_string($connection, $_POST['age']);
    
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);

    $complainanee = mysqli_real_escape_string($connection, $_POST['complainanee']);

    $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
    
    $age1 = mysqli_real_escape_string($connection, $_POST['age1']);
    
    $contact1 = mysqli_real_escape_string($connection, $_POST['contact1']);

    
    $complaint = mysqli_real_escape_string($connection, $_POST['complaint']);

    $incidence = mysqli_real_escape_string($connection, $_POST['incidence']);

    $action = mysqli_real_escape_string($connection, $_POST['action']);

    $status = mysqli_real_escape_string($connection, $_POST['status']);
    
    $monthNum = date("m");
    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
   $date = $monthName."-".date("d")."-"."20".date("y");

    $sqlblotter = "INSERT INTO `blotterrecord`(`complainant`, `address`, `age`, `contact`, `complainanee`, `address1`, `age1`, `contact1`, `complaint`, `status`, `action`, `incidence`, `date`) VALUES ('{$complainant}','{$address}','$age','$contact','{$complainanee}','{$address1}','{$age1}','{$contact1}','{$complaint}','{$status}','{$action}','{$incidence}','{$date}')";
    $queryblotter = mysqli_query($connection, $sqlblotter);
    echo ' <script> window.location.href=("http://localhost/barangaymanagementsystem/app/php/blotterrecord.php")</script>';
   

}
?>