<?php

var_dump($_POST);
$attendances = $_POST['attendance'];
foreach($attendances as $ID=>$attendance) {
    foreach($attendance as $curr) {
        echo $ID . " " . $curr . "<br>";
    }
}
?>