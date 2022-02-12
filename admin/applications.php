<?php
include_once 'session.php';
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Applications</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="sign-in.css">
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Applications</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Time Submitted</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM applications";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        $status;
                                        switch($result['appstatus']) {
                                            case 0:
                                                $status = "Pending";
                                                break;
                                            case 1:
                                                $status = "Accepted";
                                                break;
                                            case 2:
                                                $status = "Delayed";
                                                break;
                                            case 3:
                                                $status = "Rejected";
                                                break;
                                        }
                                        echo "<tr>";
                                        echo "<td>" . $result['ID'] . "</td>";
                                        echo "<td>" . $status . "</td>";
                                        echo "<td>" . substr($result['firstname'], 0, 1) . ". " . $result['surname'] . "</td>";
                                        echo "<td>" . $result['time'] . "</td>";
                                        echo "<td><a class=\"text-light\" href=\"application.php?id=" . $result['ID'] . "\"><i class=\"fas fa-id-badge\"></i></a></td>";
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