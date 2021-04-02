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
$addrecord = "INSERT INTO records (memberID, promorank, recorddate) VALUES ('" . $id . "', '" . $rank . "', '" . $date . "')";
mysqli_query($link, $addrecord);

header( "refresh:5;url=members.php" );
echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
?>