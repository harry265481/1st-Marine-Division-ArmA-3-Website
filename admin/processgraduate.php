<?php

include_once '../config.php';

$id = $_GET['id'];
$course = $_POST['course'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("d-M-Y");
    $date = date_create($date);
}

$date = date_format($date, "d\-M\-Y");

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, coursetype, recorddate) VALUES (" . $id . ", 5," . $course . ", '" . $date . "')");

header("Location: members.php");
?>