<?php include_once 'session.php';
      include_once '../functions.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Dashboard</title>
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
                        <h1 class="h2 text-light">Dashboard</h1>
                    </div>
                    <div class="container text-light">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Total Unit Members: <?php echo getTotalUnitMembers(); ?></h5>
                                <h5></h5>
                                <h5></h5>
                                <h5></h5>
                                <h5></h5>
                            </div>
                            <div class="col-md-3">
                                <?php makeUnitCompositionTable(); ?>
                            </div>
                            <div class="col-md-3">
                                <?php generateUnitCompositionPieChart() ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>