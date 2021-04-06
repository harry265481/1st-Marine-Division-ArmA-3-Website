<?php
include_once 'session.php';
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Application</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Process</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <form action="processnewmember.php" method="post">
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
                                    <label for="firstname" class="form-label text-dark">First Name</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
                                    <label for="firstname" class="form-label text-dark">Surname</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="rankhint" class="form-text text-light h3">Rank</div>
                                <select class="form-select text-dark" id="rank" name="rank">
                                    <?php 
                                        $ranks = mysqli_query($link, "SELECT ID, rank_name FROM rank");
                                        foreach($ranks as $rank) {
                                            echo "<option value=\"" . $rank['ID'] . "\">" . $rank['rank_name'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md">
                                <div id="moshint" class="form-text text-light h3">MOS</div>
                                <select class="form-select text-dark" id="MOS" name="MOS">
                                    <?php 
                                        $moss = mysqli_query($link, "SELECT ID, MOS, mosname FROM mos");
                                        foreach($moss as $mos) {
                                            echo "<option value=\"" . $mos['ID'] . "\">" . $mos['MOS'] . " " . $mos['mosname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="doehint" class="form-text text-light h3">Date of Enlistment</div>
                                <input type="date" class="form-control" name="doe"></input>
                            </div>
                            <div class="col-md">
                                <div id="dorhint" class="form-text text-light h3">Date of Rank</div>
                                <input type="date" class="form-control" name="dor"></input>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="pointshint" class="form-text text-light h3">Initial Points</div>
                                <input type="number" class="form-control" name="points"></input>
                            </div>
                            <div class="col-md">
                                <div id="poshint" class="form-text text-light h3">Position</div>
                                <select class="form-select text-dark" id="pos" name="pos">
                                    <?php 
                                        $positions = mysqli_query($link, "SELECT * FROM positions WHERE positiontype = 0");
                                        foreach($positions as $position) {
                                            echo "<option value=\"" . $position['ID'] . "\">" . $position['positionname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="doehint" class="form-text text-light h3">Unit</div>
                                <select class="form-select text-dark" id="unit" name="unit">
                                    <?php 
                                        $units = mysqli_query($link, "SELECT * FROM units ORDER BY unitorder asc");
                                        foreach($units as $unit) {
                                            echo "<option value=\"" . $unit['ID'] . "\">" . $unit['unitname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md">
                                <div id="dorhint" class="form-text text-light h3">Status</div>
                                <select class="form-select text-dark" id="status" name="status">
                                    <?php 
                                        $statuses = mysqli_query($link, "SELECT * FROM status");
                                        foreach($statuses as $status) {
                                            echo "<option value=\"" . $status['ID'] . "\">" . $status['status'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="pilothint" class="form-text text-light h3">Are they a pilot?</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pilot" value="1" id="pilot">
                                </div>
                            </div>
                            <div class="col-md">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit" value="1">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
</html>