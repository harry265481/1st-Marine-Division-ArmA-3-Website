<?php
include_once 'session.php';
include_once '../config.php';
include_once '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Members</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
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
                        <h1 class="h2 text-light"></h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php buildEventRows(); ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>