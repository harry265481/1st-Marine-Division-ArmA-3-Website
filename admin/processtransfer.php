<?php
include_once '../config.php';

$id = $_GET['id'];
$pos = $_POST['pos'];
$unit = $_POST['unit'];
$mos = $_POST['mos'];
$date = $_POST['date'];
$status = $_POST['status'];

if(isset($_POST['today'])) { 
    $usetoday = $_POST['today'];
    if($usetoday == "true") {
        $date = date("d-M-Y");
    } 
}

$date = date_create($date);
$date = date_format($date, "d\-M\-Y");


$current = mysqli_fetch_row(mysqli_query($link, "SELECT unitID, position FROM personnel WHERE ID=" . $id));
$oldunit = $current[0];
$oldpos = $current[1];
//Update personnel record
mysqli_query($link, "UPDATE personnel SET position=" . $pos . ", unitID=" . $unit . ", mos=" . $mos . ", status=" . $status . " WHERE ID=" . $id);

//Add record to record table
mysqli_query($link, "INSERT INTO records (memberID, recordType, transferfrom transferto, oldpos, newpos, recorddate) 
                                  VALUES (" . $id . ", 4," . $oldunit . ", " . $unit . ", " . $oldpos . ", " . $pos . ", '". $date . "')");
header("Location: members.php");

?>