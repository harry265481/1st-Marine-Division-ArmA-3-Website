<?php
include_once 'session.php';
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Members</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Units</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <?php
                        $battunits = mysqli_query($link, "SELECT * FROM units WHERE parents=''");
                        foreach($battunits as $batt) {
                            echo "<div class=\"card card-body\">";
                            echo $batt['unitname'];
                            $compunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $batt['ID']);
                            foreach($compunits as $comp) {
                                echo "<div class=\"card card-body\">";
                                echo $comp['unitname'];
                                $platunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $comp['ID']);
                                foreach($platunits as $plat) {
                                    echo "<div class=\"card card-body\">";
                                    echo $plat['unitname'];
                                    $squadunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $plat['ID']);
                                    foreach($squadunits as $squad) {
                                        echo "<div class=\"card card-body\">";
                                        echo $squad['unitname'];
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                    ?>
                </main>
            </div>
        </div>
    </body>
</html>