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
mysqli_query($link, "UPDATE personnel SET rank=" . $rank . " WHERE ID=" . $id);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, promorank, recorddate) VALUES (" . $id . ", 2," . $rank . ", " . $date . ")");
header("Location: members.php");
?>