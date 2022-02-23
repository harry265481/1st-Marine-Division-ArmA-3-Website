<?php
include_once '../../config.php';
$members = "SELECT ID, DOE FROM personnel";
$members = mysqli_query($link, $members);
foreach($members as $member) {
    mysqli_query($link, "INSERT INTO records (memberID, recordType, recorddate) VALUES ('" . $member['ID'] . "', 0, '" . $member['DOE'] . "')");
}
?>