<?php

include_once '../config.php';

$id = $_GET['id'];
$award = $_POST['award'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("Y-m-d");
}

//Add record to record table
mysqli_query($link, "INSERT INTO award (memberID, awardID, awarddate) VALUES (" . $id . ", " . $award . ", " . $date . ")");

header("Location: members.php");
?>