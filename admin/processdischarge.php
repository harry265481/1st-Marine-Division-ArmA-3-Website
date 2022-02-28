<?php

include_once '../config.php';

$id = $_GET['id'];
$type = $_POST['type'];
$date = $_POST['date'];

if($type == 6) {
    $status = 4;
} else {
    $status = 5;
}

//Update personnel record
mysqli_query($link, "UPDATE personnel SET unitID = 20, status = " . $status . " WHERE ID=" . $id);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, retirementtype, recorddate) VALUES (" . $id . ", 1," . $type . ", '" . $date . "')");

header("Location: members.php");
?>