<?php

include_once '../config.php';

$id = $_GET['id'];
$course = $_POST['course'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("Y-m-d");
}

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, coursetype, recorddate) VALUES (" . $id . ", 5," . $course . ", " . $date . ")");

header( "refresh:5;url=members.php" );
echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
?>