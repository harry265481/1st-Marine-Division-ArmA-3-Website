<?php

include_once '../config.php';

echo "<table>";
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table>";

echo "<table>";
    foreach ($_POST['attendance'] as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo "</table>";
/*
$id = $_GET['id'];
$rank = $_POST['rank'];
$date = $_POST['date'];
*/
//Update personnel record
//mysqli_query($link, "UPDATE personnel SET rank=" . $rank . " WHERE ID=" . $id);

//Add record to record table
//mysqli_query($link, "INSERT INTO records (memberID, recordType, promorank, recorddate) VALUES (" . $id . ", 2," . $rank . ", '" . $date . "')");

//header("Location: members.php");
?>