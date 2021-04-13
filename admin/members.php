<?php
include_once 'session.php';
include_once '../config.php';
include_once '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Members</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Members</h1>
                        <h1></h1>
                        <a href="addmember.php"><button type="button" class="btn btn-outline-danger">Add Member</button></a>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                    <?php
                        $battunits = mysqli_query($link, "SELECT * FROM units WHERE parents='' AND active=1 ORDER BY unitorder asc");
                        foreach($battunits as $batt) {
                            echo "<h1 class=\"h2 text-light\">" . $batt['unitname'] . "</h1>";
                            echo "<div class=\"btn-toolbar mb-2 mb-md-0\"></div>";
                            echo "<table class=\"table table-dark table-striped align-middle table-sm\">";
                            echo    "<thead>";
                            echo        "<tr>";
                            echo            "<th></th>";
                            echo            "<th>Name</th>";
                            echo            "<th>Position</th>";
                            echo            "<th>Status</th>";
                            echo            "<th>Rank</th>";
                            echo            "<th>Join Date</th>";
                            echo            "<th></th>";
                            echo            "<th></th>";
                            echo        "</tr>";
                            echo    "</thead>";
                            echo    "<tbody>";
                                    buildUnitMemberTable($batt['ID'], "../");
                            echo    "</tbody>";
                            echo "</table>";
                            $compunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $batt['ID'] . " AND active=1 ORDER BY unitorder asc");
                            foreach($compunits as $comp) {
                            echo "<h1 class=\"h3 text-light\">" . $comp['unitname'] . "</h1>";
                            echo "<div class=\"btn-toolbar mb-2 mb-md-0\"></div>";
                            echo "<table class=\"table table-dark table-striped align-middle table-sm\">";
                            echo    "<thead>";
                            echo        "<tr>";
                            echo            "<th></th>";
                            echo            "<th>Name</th>";
                            echo            "<th>Position</th>";
                            echo            "<th>Status</th>";
                            echo            "<th>Rank</th>";
                            echo            "<th>Join Date</th>";
                            echo            "<th></th>";
                            echo            "<th></th>";
                            echo        "</tr>";
                            echo    "</thead>";
                            echo    "<tbody>";
                                    buildUnitMemberTable($comp['ID'], "../");
                            echo    "</tbody>";
                            echo "</table>";
                                $platunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $comp['ID'] . " AND active=1 ORDER BY unitorder asc");
                                foreach($platunits as $plat) {
                                    echo "<h1 class=\"h4 text-light\">" . $plat['unitname'] . "</h1>";
                                    echo "<div class=\"btn-toolbar mb-2 mb-md-0\"></div>";
                                    echo "<table class=\"table table-dark table-striped align-middle table-sm\">";
                                    echo    "<thead>";
                                    echo        "<tr>";
                                    echo            "<th></th>";
                                    echo            "<th>Name</th>";
                                    echo            "<th>Position</th>";
                                    echo            "<th>Status</th>";
                                    echo            "<th>Rank</th>";
                                    echo            "<th>Join Date</th>";
                                    echo            "<th></th>";
                                    echo            "<th></th>";
                                    echo        "</tr>";
                                    echo    "</thead>";
                                    echo    "<tbody>";
                                            buildUnitMemberTable($plat['ID'], "../");
                                    echo    "</tbody>";
                                    echo "</table>";
                                    $squadunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $plat['ID'] . " AND active=1 ORDER BY unitorder asc");
                                    foreach($squadunits as $squad) {
                                        echo "<h1 class=\"h5 text-light\">" . $squad['unitname'] . "</h1>";
                                        echo "<div class=\"btn-toolbar mb-2 mb-md-0\"></div>";
                                        echo "<table class=\"table table-dark table-striped align-middle table-sm\">";
                                        echo    "<thead>";
                                        echo        "<tr>";
                                        echo            "<th></th>";
                                        echo            "<th>Name</th>";
                                        echo            "<th>Position</th>";
                                        echo            "<th>Status</th>";
                                        echo            "<th>Rank</th>";
                                        echo            "<th>Join Date</th>";
                                        echo            "<th></th>";
                                        echo            "<th></th>";
                                        echo        "</tr>";
                                        echo    "</thead>";
                                        echo    "<tbody>";
                                                buildUnitMemberTable($squad['ID'], "../");
                                        echo    "</tbody>";
                                        echo "</table>";
                                    }
                                }
                            }
                        }
                    ?>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>