<?php
include_once 'session.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Infantry Division - Demote</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
        <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <form method="post" action="processaddevent.php">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Add Event</h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="col-md">
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
</html>