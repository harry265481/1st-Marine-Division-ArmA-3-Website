<?php

var_dump($_POST);
$attendances = $_POST['attendance'];
foreach($attendances as $attendance) {
    foreach($attendance as $ID=>$curr) {
        echo $ID . " " . $curr . "<br>";
    }
}
?>