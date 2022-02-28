<?php

include_once '../config.php';

$id = $_GET['id'];
$award = $_POST['award'];
$date = $_POST['date'];

//Add record to record table
if(mysqli_query($link, "INSERT INTO awardrecord (memberID, awardID, awarddate) VALUES (" . $id . ", " . $award . ", '" . $date . "')") == false) {
    echo mysqli_error($link);
} else {
    header("Location: members.php");
}

?>