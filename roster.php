<?php include_once 'config.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Roster</title>
        <?php include 'header.php' ?>
        <link rel="stylesheet" href="index.css">
    </head>
    <body class="bg-dark">
        <?php include 'nav.php' ?>
        <div class="spacer"></div>
        <div class="spacer"><p class="h1 position-absolute start-50 translate-middle-x" style="color:white;">ROSTER</p></div>
        <div class="container-fluid">
            <div class="row">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Marines</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Join Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM personnel";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        $abbrevquery = "SELECT rank_name, paygrade FROM rank WHERE ID=" . $result['rank'] . " AND branch=" . $result['branch'];
                                        $abbrevresults = mysqli_query($link, $abbrevquery);
                                        $abbrevrow = mysqli_fetch_row($abbrevresults);

                                        $imagename = substr($abbrevrow[1], 0, 1) . substr($abbrevrow[1], 2, 1);
                                        $branch;
                                        if($result['branch'] == 0) {
                                            $branch = "marine";
                                        } else if($result['branch'] == 1) {
                                            $branch = "navy";
                                        }
                                        $imagestring = "images/ranks/" . $branch . "/small/" . $imagename;

                                        echo "<tr>";
                                        echo "<td><img class=\"mx-auto d-block\" height=\"40px\" src=" . $imagestring . ".png></td>";
                                        echo "<td>" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
                                        echo "<td>" . $abbrevrow[0] . "</td>";
                                        echo "<td>" . $result['DOE'] . "</td>";
                                        echo "<td><a class=\"text-light\" href=\"member.php?id=" . $result['ID'] . "\"><i class=\"fas fa-id-badge\"></i></a></td>";
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