<?php
include_once 'session.php';
include_once '../functions.php';
include_once '../config.php';

$query = "SELECT * FROM personnel WHERE ID=" . $_GET['id'];
$results = mysqli_query($link, $query);
$row = mysqli_fetch_row($results);
$firstname = $row[1];
$surname = $row[2];
$rank = $row[3];
$position = $row[10];
$unit = $row[11];
$mos = $row[9];
$status = $row[12];
$shortname = substr($firstname, 0, 1) . ". " . $surname;
$positionrow = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $position));
$unitrow = mysqli_fetch_row(mysqli_query($link, "SELECT unitname FROM units WHERE ID=" . $unit));
$mosrow = mysqli_fetch_row(mysqli_query($link, "SELECT MOS, mosname FROM mos WHERE ID=" . $mos));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Transfer</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
        <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <form method="post" action="processtransfer.php?id=<?php echo $_GET['id'] ?>">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Transfer - <?php echo $shortname ?></h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    <h4>Current Position: <?php echo $positionrow[0] ?></h4>
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="pos" name="pos">
                                    <?php 
                                        $positions = mysqli_query($link, "SELECT ID, positionname FROM positions WHERE positiontype=0");
                                        foreach($positions as $position) {
                                            echo "<option value=\"" . $position['ID'] . "\">" . $position['positionname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                <h4>Current Unit: <?php echo $unitrow[0] ?></h4>
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="unit" name="unit">
                                    <?php 
                                        $units = mysqli_query($link, "SELECT ID, unitname FROM units ORDER BY unitorder asc");
                                        foreach($units as $unit) {
                                            echo "<option value=\"" . $unit['ID'] . "\">" . $unit['unitname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    <h4>Current Status: <?php echo getStatusName($status) ?></h4>
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="status" name="status">
                                    <?php 
                                        $statuses = mysqli_query($link, "SELECT ID, status FROM status");
                                        foreach($statuses as $status) {
                                            echo "<option value=\"" . $status['ID'] . "\">" . $status['status'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    <h4>Current MOS: <?php echo $mosrow[0] . " " . $mosrow[1] ?></h4>
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="mos" name="mos">
                                    <?php 
                                        $moss = mysqli_query($link, "SELECT ID, MOS, mosname FROM mos");
                                        foreach($moss as $mos) {
                                            echo "<option value=\"" . $mos['ID'] . "\">" . $mos['MOS'] . " " . $mos['mosname'] ."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                            </div>
                            <div class="col-md">
                                <input type="date" class="form-control" name="date">
                                <div class="form-check">
                                    <input class="form-check-input" name="today" type="checkbox" value="true" id="flexCheckDefault" checked>
                                    <label class="form-check-label text-light" for="flexCheckDefault">Use today's date</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
</html>