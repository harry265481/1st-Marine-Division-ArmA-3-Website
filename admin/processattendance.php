<?php
include_once '../config.php';
$attendances = $_POST['attendance'];
$event = $_POST['event'];
foreach($attendances as $ID=>$attendance) {
    foreach($attendance as $curr) {
        if(mysqli_query($link, "INSERT INTO attendance (memberID, opid, presence) VALUES ('" . $ID . "', '" . $event . "', '" . $curr . "')"))
            echo mysqli_error($link);
        } else {
            header("Location: members.php");
        }
    }
}
?>