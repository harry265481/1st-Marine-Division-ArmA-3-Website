<?php
include_once '../config.php';

$id = $_GET['id'];
$pos = $_POST['pos'];
$unit = $_POST['unit'];
$mos = $_POST['mos'];
$date = $_POST['date'];
$usetoday = $_POST['today'];

if($usetoday == "true") {
    $date = date("Y-m-d");
}
$current = mysqli_fetch_row(mysqli_query($link, "SELECT unitID, position FROM personnel WHERE ID=" . $id));
$oldunit = $current[0];
$oldpos = $current[1];
//Update personnel record
mysqli_query($link, "UPDATE personnel SET position=" . $pos . ", unitID=" . $unit . ", mos=" . $mos . " WHERE ID=" . $id);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, transferfrom transferto, oldpos, newpos, recorddate) 
                                  VALUES (" . $id . ", 4," . $oldunit . ", " . $unit . ", " . $oldpos . ", " . $pos . ")");

header( "refresh:5;url=members.php" );
echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.'

?>