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
        foreach($value as $row) {
        echo "<tr>";
        echo "<td>";
        echo $row;
        echo "</td>";
        echo "</tr>";
        }
    }
echo "</table>";
$attendance = "INSERT INTO attendance (memberID, eventID, "
//Update personnel record
//mysqli_query($link, "UPDATE personnel SET rank=" . $rank . " WHERE ID=" . $id);

//Add record to record table
//mysqli_query($link, "INSERT INTO records (memberID, recordType, promorank, recorddate) VALUES (" . $id . ", 2," . $rank . ", '" . $date . "')");

//header("Location: members.php");
    ?>