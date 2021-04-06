<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: sign-in.php");
    exit;
} else {
    include_once '../config.php';
    $levelresult = mysqli_query($link, "SELECT adminlevel FROM users WHERE id=" . $_SESSION['id']);
    $userrow = mysqli_fetch_row($levelresult);
    if($userrow[0] == 0) {
        header('HTTP/1.1 403 Forbidden');
        exit;
    }
}
?>