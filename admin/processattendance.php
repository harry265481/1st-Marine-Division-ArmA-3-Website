<?php
include_once '../config.php';
$attendances = $_POST['attendance'];
foreach($attendances as $ID=>$attendance) {
    foreach($attendance as $curr) {
        mysqli_query($link, "INSERT INTO attendance () VALUES ()");
    }
}
?>