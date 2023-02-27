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

$sqlquery4 = "SELECT * FROM `blotterrecord` ORDER BY `date` asc ";
$sqlresult4 =  mysqli_query($connection, $sqlquery4);

$sqlquery5 = "SELECT * FROM `approvedrequestrecord` ";
$sqlresult5 =  mysqli_query($connection, $sqlquery5);


$sqlquery6 = "SELECT * FROM `declinedrequestrecord` ";
$sqlresult6 =  mysqli_query($connection, $sqlquery6);

if(isset($_POST['searchbtn'])){
    $searchbox = mysqli_real_escape_string($connection, $_POST['searchbox']);
    $sqlquery1 = "SELECT * FROM `officialsandstaff` where  `name` LIke '{$searchbox}___%'  ";
    $sqlresult1 =  mysqli_query($connection, $sqlquery1);
    

}
if(isset($_POST['consubmit'])){
    $value = mysqli_real_escape_string($connection,$_POST['sort']);
    if($value === "All"){
        $sqlquery2 = "SELECT * FROM `residentsdata` ";
    }
    else{
        $sqlquery2 = "SELECT * FROM `residentsdata` WHERE conditionstatus = '{$value}' ";
        $sqlresult2 =  mysqli_query($connection, $sqlquery2);
        
    }
}




?>