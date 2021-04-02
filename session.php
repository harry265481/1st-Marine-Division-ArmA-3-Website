<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: sign-in.php");
    exit;
} else {
    include_once '../config.php';
    $query = "SELECT adminlevel FROM users WHERE id=" . $_SESSION['id'];
    $levelresult = mysqli_query($link, $query);
    $userrow = mysqli_fetch_row($levelresult);
    if($userrow[0] == 0) {
        header("location: index.php");
        exit;
    }
}
?>