<?php

var_dump($_POST);
$attendances = $_POST['attendance'];
foreach($attendances as $attendance) {
    foreach($attendance as $curr) {
        echo $curr . "<br>";
    }
}
?>