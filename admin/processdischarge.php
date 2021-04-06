<?php

include_once '../config.php';

$id = $_GET['id'];
$type = $_POST['type'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("Y-m-d");
}

if($type == 6) } {
    $status = 4;
} else {
    $status = 5;
}

//Update personnel record
$updaterecord = "UPDATE personnel SET unitID = 20, status = " . $status . " WHERE ID=" . $id;
mysqli_query($link, $updaterank);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, retirementtype, recorddate) VALUES (" . $id . ", 1," . $type . ", " . $date . ")";

header( "refresh:5;url=members.php" );
echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
?>