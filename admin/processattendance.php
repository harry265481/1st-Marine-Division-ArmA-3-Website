<?php

var_dump($_POST);
$attendances = $_POST['attendance'];
foreach($attendances as $attendance) {
    foreach($attendance a $ID=>$curr) {
        echo $ID . " " . $curr . "<br>";
    }
}
?>