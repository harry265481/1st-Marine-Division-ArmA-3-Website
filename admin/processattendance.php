<?php

var_dump($_POST);
$attendances = $_POST['attendance'];
foreach($attendances as $attendance) {
    echo $attendance[0] . "<br>";
}
?>