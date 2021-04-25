<?php

include_once '../config.php';

$id = $_GET['id'];
$award = $_POST['award'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("d-M-Y");
}

$date = date_format($date, "d-M-Y");

//Add record to record table
if(mysqli_query($link, "INSERT INTO awardrecord (memberID, awardID, awarddate) VALUES (" . $id . ", " . $award . ", " . $date . ")")) {
    header("Location: members.php");
}

?>