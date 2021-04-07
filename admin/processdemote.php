<?php

include_once '../config.php';

$id = $_GET['id'];
$rank = $_POST['rank'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("Y-m-d");
}

//Update personnel record
$updaterank = "UPDATE personnel SET rank=" . $rank . " WHERE ID=" . $id;
mysqli_query($link, $updaterank);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, demorank, recorddate) VALUES (" . $id . ", 3," . $rank . ", " . $date . ")");

header( "refresh:5;url=members.php" );
echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
?>