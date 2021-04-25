<?php

include_once '../config.php';

$id = $_GET['id'];
$rank = $_POST['rank'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("d-M-Y");
    $date = date_create($date);
}

$date = date_format($date, "d\-M\-Y");

//Update personnel record
$updaterank = "UPDATE personnel SET rank=" . $rank . " WHERE ID=" . $id;
mysqli_query($link, $updaterank);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, demorank, recorddate) VALUES (" . $id . ", 3," . $rank . ", '" . $date . "')");
header("Location: members.php");
?>