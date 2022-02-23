<?php
include_once '../../config.php';
$members = "SELECT id, DOE FROM personnel";
$members = mysqli_query($link, $members);
foreach($members as $member) {
    mysqli_query($link, "INSERT INTO records (memberID, recordType, recorddate) VALUES ('" . $member[0] . "', 0, '" . $member[1] . "')");
}
?>