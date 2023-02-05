<?php
include('connection.php');


$sqlquery = "SELECT * FROM `requestrecord` ";
$sqlresult =  mysqli_query($connection, $sqlquery);

$sqlquery1 = "SELECT * FROM `officialsandstaff` ORDER BY position desc ";
$sqlresult1 =  mysqli_query($connection, $sqlquery1);

$sqlquery2 = "SELECT * FROM `residentsdata` ";
$sqlresult2 =  mysqli_query($connection, $sqlquery2);

$sqlquery3 = "SELECT * FROM `householddata` ";
$sqlresult3 =  mysqli_query($connection, $sqlquery3);


if(isset($_POST['searchbtn'])){
    $searchbox = mysqli_real_escape_string($connection, $_POST['searchbox']);
    $sqlquery1 = "SELECT * FROM `officialsandstaff` where  `name` LIke '{$searchbox}___%'  ";
    $sqlresult1 =  mysqli_query($connection, $sqlquery1);
    

}

?>