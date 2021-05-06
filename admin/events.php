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
        <title>1st Infantry Division - Events</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="sign-in.css">
    </head>
    <body>
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Events</h1>
                        <h1></h1>
                        <a href="addevent.php"><button type="button" class="btn btn-outline-danger">Add Event</button></a>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>Event</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM events ORDER BY eventdate desc";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        echo "<tr>";
                                        echo    "<td>" . $result['eventtitle'] . "</td>";
                                        echo    "<td>" . $result['eventdate'] . "</td>";
                                        echo "<tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>