<?php include_once 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Dashboard</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="sign-in.css">
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row text-light">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Awards and Decorations</h1>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h3">Overview</h1>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h4">Purpose</h1>
                    </div>
                    <p>The purpose of this document is to outline the requirements for the various awards, decorations and badges within the 1st Marine Division</p>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h5">Responsibility</h1>
                    </div>
                    <ol>
                        <li>The Division Command staff will oversee the maintenance of this policy.</li>
                        <li>The S1 Department Head will be responsible for the implementation of this policy</li>
                    </ol>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h3">Medals and Ribbons</h1>
                    </div>
                    <table class="table table-dark table-striped align-middle table-sm">
                        <thead>
                            <tr>
                                <th>Ribbon</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Approval Authority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM awards WHERE awardtype=0 OR awardtype=3";
                                $results = mysqli_query($link, $query);
                                foreach ($results as $result)  {
                                    $ribbonstring = "../images/awards/ribbons/" . $result['awardfilename'];

                                    echo "<tr>";
                                    echo "<td><img class=\"mx-auto d-block\" height=\"30px\" src=" . $ribbonstring . ".jpg></td>";
                                    echo "<td>" . $result['awardname'] . "</td>";
                                    switch($result['awardcategory']) {
                                        case 0:
                                            echo "<td>Meritorious</td>";
                                            break;
                                        case 1:
                                            echo "<td>Service</td>";
                                            break;
                                        case 2:
                                            echo "<td>Automatic</td>";
                                            break;
                                        case 2:
                                            echo "<td>Not Awarded</td>";
                                            break;
                                    }
                                    echo "<td>" . $result['awardescription'] . "</td>";
                                    echo "<td></td>";
                                }
                            ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </body>
</html>