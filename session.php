<?php
include_once 'config.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: sign-in.php");
    exit;
} else {
    $levelresult = mysqli_query($link, "SELECT adminlevel FROM users WHERE id=" . $_SESSION['id']);
    $userrow = mysqli_fetch_row($levelresult);
    if($userrow[0] == 0) {
        header("location: index.php");
        exit;
    }
}
?>