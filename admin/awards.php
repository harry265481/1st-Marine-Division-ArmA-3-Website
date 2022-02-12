<?php
    include_once 'session.php';
    include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - awards</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Awards</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM awards WHERE awardtype=0 OR awardtype=3";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        $ribbonstring = "../images/awards/ribbons/" . $result['awardfilename'];

                                        echo "<tr>";
                                        if($result['medal'] == 0) {
                                            echo "<td></td>";
                                        } else {
                                            $medalstring = "../images/awards/medals/" . $result['awardfilename'];
                                            echo "<td><img class=\"mx-auto d-block\" height=\"150px\" src=" . $medalstring . ".png></td>";
                                        }
                                        echo "<td><img class=\"mx-auto d-block\" height=\"30px\" src=" . $ribbonstring . ".jpg></td>";
                                        echo "<td>" . $result['awardname'] . "</td>";
                                        echo "<td>" . $result['awardescription'] . "</td>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Badges</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM awards WHERE awardtype=2";
                                    $results = mysqli_query($link, $query);
                                    foreach ($results as $result)  {
                                        $ribbonstring = "../images/awards/badges/" . $result['awardfilename'];

                                        echo "<tr>";
                                        echo "<td><img class=\"mx-auto d-block\" height=\"100px\" src=" . $ribbonstring . ".png></td>";
                                        echo "<td>" . $result['awardname'] . "</td>";
                                        echo "<td>" . $result['awardescription'] . "</td>";
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