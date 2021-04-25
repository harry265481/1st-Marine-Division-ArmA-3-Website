<?php

include_once '../config.php';

$id = $_GET['id'];
$award = $_POST['award'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("d-M-Y");
    $date = date_create($date);
}

$date = date_format($date, "d\-M\-Y");

//Add record to record table
if(mysqli_query($link, "INSERT INTO awardrecord (memberID, awardID, awarddate) VALUES (" . $id . ", " . $award . ", " . $date . ")") == false) {
    echo mysqli_error($link);
} else {
    header("Location: members.php");
}

?>