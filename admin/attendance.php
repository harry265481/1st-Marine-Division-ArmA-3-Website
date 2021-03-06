<?php
include_once 'session.php';
include_once '../config.php';
include_once '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Attendance</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <form method="post" action="processattendance.php">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Attendance</h1>
                            <h1></h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="table-responsive">
                            <div class="btn-toolbar mb-2 mb-md-0\"></div>
                            <table class="table table-dark table-striped align-middle table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $battunits = mysqli_query($link, "SELECT * FROM units WHERE parents='' ORDER BY unitorder asc");
                                    foreach($battunits as $batt) {
                                            buildAttendanceRow($batt['ID'], "../");
                                        $compunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $batt['ID'] . " ORDER BY unitorder asc");
                                        foreach($compunits as $comp) {
                                            buildAttendanceRow($comp['ID'], "../");
                                            $platunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $comp['ID'] . " ORDER BY unitorder asc");
                                            foreach($platunits as $plat) {
                                                buildAttendanceRow($plat['ID'], "../");
                                                $squadunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $plat['ID'] . "  ORDER BY unitorder asc");
                                                foreach($squadunits as $squad) {
                                                    buildAttendanceRow($squad['ID'], "../");
                                                }
                                            }
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
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