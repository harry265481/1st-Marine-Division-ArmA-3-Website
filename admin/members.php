<?php
include_once 'session.php';
include_once '../config.php';
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
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Rank</th>
                                    <th>Join Date</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM personnel";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        $abbrevquery = "SELECT rank_name, paygrade FROM rank WHERE ID=" . $result['rank'] . " AND branch=" . $result['branch'];
                                        $abbrevrow = mysqli_fetch_row(mysqli_query($link, $abbrevquery));

                                        $statusquery = "SELECT * FROM status WHERE ID=" . $result['status'];
                                        $statusrow = mysqli_fetch_row(mysqli_query($link, $statusquery));

                                        $imagename = substr($abbrevrow[1], 0, 1) . substr($abbrevrow[1], 2, 1);
                                        $branch;
                                        if($result['branch'] == 0) {
                                            $branch = "marine";
                                        } else if($result['branch'] == 1) {
                                            $branch = "navy";
                                        }
                                        $imagestring = "../images/ranks/" . $branch . "/small/" . $imagename;

                                        echo "<tr>";
                                        echo    "<td><img class=\"mx-auto d-block\" height=\"30px\" src=" . $imagestring . ".png></td>";
                                        echo    "<td>" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
                                        echo    "<td><span class=\"badge rounded-pill bg-" . $statusrow[2] . " text-" . $statusrow[3] . "\">" . $statusrow[1] . "</span></td>";
                                        echo    "<td>" . $abbrevrow[0] . "</td>";
                                        echo    "<td>" . $result['DOE'] . "</td>";
                                        echo    "<td>";
                                        echo        "<div class=\"dropdown\">";
                                        echo            "<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"></button>";
                                        echo            "<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">";
                                        echo                "<li><a class=\"dropdown-item\" href=\"promote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-up\"></i> Promote</a></li>";
                                        echo                "<li><a class=\"dropdown-item\" href=\"demote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-down\"></i> Demote</a></li>";
                                        echo                "<li><a class=\"dropdown-item\" href=\"transfer.php?id=" . $result['ID'] . "\"><i class=\"fas fa-arrows-alt-h\"></i> Transfer</a></li>";
                                        echo                "<li><a class=\"dropdown-item\" href=\"graduate.php?id=" . $result['ID'] . "\"><i class=\"fas fa-graduation-cap\"></i> Graduation</a></li>";
                                        echo                "<li><a class=\"dropdown-item\" href=\"discharge.php?id=" . $result['ID'] . "\"><i class=\"fas fa-user-clock\"></i> LOA</a></li>";
                                        echo                "<li><a class=\"dropdown-item\" href=\"award.php?id=" . $result['ID'] . "\"><i class=\"fas fa-times-circle\"></i> Discharge</a></li>";
                                        echo            "</ul>";
                                        echo        "</div>";
                                        echo    "</td>";
                                        echo    "<td><a class=\"text-light\" href=\"../member.php?id=" . $result['ID'] . "\"><i class=\"fas fa-id-badge\"></i></a></td>";
                                        echo "</tr>";
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