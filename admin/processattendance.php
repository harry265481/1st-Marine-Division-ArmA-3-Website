<?php
include_once '../config.php';
$attendances = $_POST['attendance'];
$event = $_POST['event'];
foreach($attendances as $ID=>$attendance) {
    foreach($attendance as $curr) {
        mysqli_query($link, "INSERT INTO attendance (memberID, opid, presence) VALUES (' . $ID . ', '" . $event . "', '" . $curr . "')");
    }
}
?>