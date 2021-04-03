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
        <title>1st Marine Division - MOS</title>
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
                        <h1 class="h2 text-light">0369 - Infantry Unit Leader - Career Path</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>Time in the Unit</th>
                                    <th>Rank Milestones</th>
                                    <th>Requirements</th>
                                    <th>Typical Roles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>8 Months</td>
                                    <td>GySgt</td>
                                    <td>Advanced Course</td>
                                    <td>Platoon Sergeant</td>
                                </tr>
                                <tr>
                                    <td>6 Months</td>
                                    <td>SSgt</td>
                                    <td>Career Course</td>
                                    <td>Platoon Sergeant</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2 class="h2 text-light">Further Career Paths</h2>
                    </div>
                    <p> <a href="0365.php">0365 - Infantry Squad Leader</a><br>
                        <a href="0369.php">0369 - Infantry Unit Leader</a></p>
                </main>
            </div>
        </div>
    </body>
</html>