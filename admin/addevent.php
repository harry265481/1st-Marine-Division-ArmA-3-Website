<?php
include_once 'session.php';
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Event</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Event</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <form action="processnewevent.php" method="post">
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="eventname" placeholder="Event Name" name="eventname">
                                    <label for="eventname" class="form-label text-dark">Event Name</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                <div id="date" class="form-text text-light h3">Date</div>
                                <input type="date" class="form-control" name="date"></input>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit" value="1">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
</html>