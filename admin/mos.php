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
        <link rel="stylesheet" href="sign-in.css">
    </head>
    <body>
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">MOS</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM mos ORDER BY mos asc";
                            $results = mysqli_query($link, $query);
                            foreach ($results as $result)  {
                                $type;
                                switch($result['mostype']) {
                                    case 0:
                                        $type = "BMOS";
                                        break;
                                    case 1:
                                        $type = "PMOS";
                                        break;
                                    case 2:
                                        $type = "AMOS";
                                        break;
                                    case 3:
                                        $type = "NMOS";
                                        break;
                                    case 4:
                                        $type = "FMOS";
                                        break;
                                    case 5:
                                        $type = "EMOS";
                                        break;
                                }

                                echo "<tr>";
                                echo "<td>" . $result['MOS'] . "</td>";
                                echo "<td>" . $result['mosname'] . "</td>";
                                echo "<td>" . $type . "</td>";
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