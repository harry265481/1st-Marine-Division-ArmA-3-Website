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
        <title><?php echo $unitname ?> - Ranks</title>
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
                        <h1 class="h2 text-light">Ranks</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <h2 class="text-light">Marine</h2>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                        <thead>
                            <tr>
                                <th>Large Icon</th>
                                <th>Small Icon</th>
                                <th>Name</th>
                                <th>Abbreviation</th>
                                <th>Pay Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM rank ORDER BY rankorder desc";
                                $results = mysqli_query($link, $query);
                                foreach ($results as $result)  {
                                    if($result['branch'] == 0) {
                                        $imagename = $result['ID'];
                                        $limgstr = "../images/ranks/marines/large/" . $imagename;
                                        $simgstr = "../images/ranks/marines/small/" . $imagename;

                                        echo "<tr>";
                                        echo "<td width=\"70px\"><img width=\"70px\" src=" . $limgstr . ".png></td>";
                                        echo "<td width=\"30px\"><img width=\"30px\" src=" . $simgstr . ".png></td>";
                                        echo "<td>" . $result['rank_name'] . "</td>";
                                        echo "<td>" . $result['abbrev'] . "</td>";
                                        echo "<td>" . $result['paygrade'] . "</td>";
                                        echo "<tr>";
                                    }
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                    <h2 class="text-light">Navy</h2>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                        <thead>
                            <tr>
                                <th>Large Icon</th>
                                <th>Small Icon</th>
                                <th>Name</th>
                                <th>Abbreviation</th>
                                <th>Pay Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $query = "SELECT * FROM rank ORDER BY rankorder desc";
                                $results = mysqli_query($link, $query);
                                foreach ($results as $result)  {
                                    if($result['branch'] == 1) {
                                        $imagename = $result['ID'];

                                        $limgstr = "../images/ranks/navy/large/" . $imagename;
                                        $simgstr = "../images/ranks/navy/small/" . $imagename;

                                        echo "<tr>";
                                        echo "<td width=\"70px\"><img width=\"70px\" src=" . $limgstr . ".png></td>";
                                        echo "<td width=\"30px\"><img width=\"30px\" src=" . $simgstr . ".png></td>";
                                        echo "<td>" . $result['rank_name'] . "</td>";
                                        echo "<td>" . $result['abbrev'] . "</td>";
                                        echo "<td>" . $result['paygrade'] . "</td>";
                                        echo "<tr>";
                                    }
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