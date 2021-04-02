<?php
include_once 'session.php';
include_once '../config.php';

$query = "SELECT * FROM applications WHERE ID=" . $_GET['id'];
$results = mysqli_query($link, $query);
$row = mysqli_fetch_row($results);
$firstname = $row[1];
$surname = $row[2];
$discord = $row[3];
$dob = $row[4];
$referrer = $row[5];
$steamid = $row[6];
$platoon = $row[7];
$career = $row[8];
$veteran = $row[9];
$otherunitnotes = $row[10];
$method = $row[13];

$shortname = substr($firstname, 0, 1) . ". " . $surname;
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
                        <h1 class="h2 text-light">Application - <?php echo $shortname ?></h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="text-light">
                                <h4>First Name: <?php echo $firstname ?></h4>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Surname: <?php echo $surname ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Discord: <?php echo $discord ?></h4>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="text-light">
                                <h4>DOB: <?php $date = date_create($dob); echo date_format($date, "j M Y");?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Source: <?php echo $method; ?></h4>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Referrer: <?php echo $referrer; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-light">
                        <h4>Steam64 ID: <?php echo $steamid; ?></h4>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Operation Availability: <?php echo $platoon; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="text-light">
                                <h4>MOS Preference: <?php echo $career; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Veterancy Claim: <?php echo $veteran; ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="text-light">
                                <h4>Other unit notes: <?php echo $otherunitnotes; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">Process</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <form action="processenlistment.php?id=<?php echo $_GET['id'] ?>" method="post">
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $firstname ?>">
                                    <label for="firstname" class="form-label text-dark">First Name</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" value="<?php echo $surname ?>">
                                    <label for="firstname" class="form-label text-dark">Surname</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div id="rankhint" class="form-text text-light h3">Rank</div>
                                <select class="form-select text-dark" id="rank" name="rank">
                                    <option selected>Choose one</option>
                                    <?php 
                                        $rankquery = "SELECT ID, rank_name FROM rank";
                                        $ranks = mysqli_query($link, $rankquery);
                                        foreach($ranks as $rank) {
                                            echo "<option value=\"" . $rank['ID'] . "\">" . $rank['rank_name'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md">
                                <div id="moshint" class="form-text text-light h3">MOS</div>
                                <select class="form-select text-dark" id="MOS" name="MOS">
                                    <option selected>Choose one</option>
                                    <?php 
                                        $mosquery = "SELECT ID, MOS, mosname FROM mos WHERE mostype = 0";
                                        $moss = mysqli_query($link, $mosquery);
                                        foreach($moss as $mos) {
                                            echo "<option value=\"" . $mos['ID'] . "\">" . $mos['MOS'] . " " . $mos['mosname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="submit" value="1">Submit</button>
                            <button class="btn btn-warning" type="submit" name="submit" value="2">Delay</button>
                            <button class="btn btn-danger" type="submit" name="submit" value="3">Reject</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </body>
</html>