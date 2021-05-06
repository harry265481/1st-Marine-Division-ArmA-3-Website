<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include_once '../config.php'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Infantry Division - MOS</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">MOS</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <?php include_once 'mos/' . $_GET['mos'] . '.php' ?>
                </main>
            </div>
        </div>
    </body>
</html>