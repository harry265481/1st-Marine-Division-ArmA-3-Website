<?php
include_once 'session.php';
include_once '../config.php';
include_once '../functions.php';
$query = "SELECT * FROM personnel WHERE ID=" . $_GET['id'];
$results = mysqli_query($link, $query);
$row = mysqli_fetch_row($results);
$name = substr($row[1], 0, 1) . ". " . $row[2];
$fullname = $row[1] . " " . $row[2];
$joindate = $row[4];
$promodate = $row[5];
$branchID = $row[7];
$position = $row[10];

$abbrevquery = "SELECT ID, rank_name, paygrade, branch FROM rank WHERE ID=" . $row[3] . " AND branch=" . $row[7];
$abbrevresults = mysqli_query($link, $abbrevquery);
$abbrevrow = mysqli_fetch_row($abbrevresults);
$rank = $abbrevrow[0];
$imagename = $abbrevquery[0];

$mosquery = "SELECT MOS, mosname FROM mos WHERE ID=" . $row[9];
$mosresults = mysqli_query($link, $mosquery);
$mosrow = mysqli_fetch_row($mosresults);
$moscode = $mosrow[0];

$branch;
$imagestring;
if($abbrevrow[2] == 0) {
    $branch = "army";
} else if($abbrevrow[2] == 1) {
    $branch = "airforce";
}
$imagestring = "../images/ranks/" . $branch . "/large/" . $imagename . ".png";

$days = dateDifference($joindate, date("Y-m-d"));
$tis;
if($days > 365) {
    $years = dateDifference($joindate, date("Y-m-d"), "%y");
    $months = dateDifference($joindate, date("Y-m-d"), "%m");
    $d = dateDifference($joindate, date("Y-m-d"), "%d");
    $tis = $years . " years, " . $months . " months, " . $d . " days";
} else {
    $months = dateDifference($joindate, date("Y-m-d"), "%m");
    $d = dateDifference($joindate, date("Y-m-d"), "%d");
    $tis = $months . " months, " . $d . " days";
}

$days = dateDifference($promodate, date("Y-m-d"));
$tig;
if($days > 365) {
    $years = dateDifference($promodate, date("Y-m-d"), "%y");
    $months = dateDifference($promodate, date("Y-m-d"), "%m");
    $d = dateDifference($promodate, date("Y-m-d"), "%d");
    $tig = $years . " years, " . $months . " months, " . $d . " days";
} else {
    $months = dateDifference($promodate, date("Y-m-d"), "%m");
    $d = dateDifference($promodate, date("Y-m-d"), "%d");
    $tig = $months . " months, " . $d . " days";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Members</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="../member.css">
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <!--<img class="mx-auto d-block" src="data:image/png;base64,<?php //echo generateUniform($_GET['id'], getMemberGrade($_GET['id']), getMemberBranchID($_GET['id']), "../"); ?>" />-->
                    <div class="container emp-profile text-light">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="width=200px!important" src="<?php echo $imagestring ?>"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile-head">
                                    <h5><?php echo $fullname; ?></h5>
                                    <h5><?php echo getPositionName($position); ?></h5>
                                    <h5><?php echo $rank; ?></h5>
                                    <h5>MOS: <?php echo $moscode ?></h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile-head">
                                    <h6>Join Date: <?php echo $joindate ?></h6>
                                    <h6>TIS: <?php echo $tis; ?> </h6>
                                    <h6>Promotion Date: <?php echo $promodate ?></h6>
                                    <h6>TIG: <?php echo $tig; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="member" role="tablist">
                                    <li class="nav-item active">
                                        <a href="#awards" class="nav-link active" data-toggle="tab">Awards</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#records" class="nav-link" data-toggle="tab">Records</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="awards">
                                        <table class="table table-dark table-striped align-middle table-sm">
                                            <thead>
                                                <th>Date</th>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $awardrecordquery = "SELECT awardID, awarddate FROM awardrecord WHERE memberID='" . $_GET['id'] . "' ORDER BY awarddate asc";
                                                    $awardrecordresults = mysqli_query($link, $awardrecordquery);
                                                    foreach($awardrecordresults as $record) {
                                                        $awardquery = "SELECT awardname, awardfilename, awardtype FROM awards WHERE ID=" . $record['awardID'];
                                                        $awardresults = mysqli_fetch_assoc(mysqli_query($link, $awardquery));
                                                        if($awardresults['awardtype'] == "0" || $awardresults['awardtype'] == "3") {
                                                            $awardstring = "../images/awards/ribbons/" . $awardresults['awardfilename'] . ".jpg";
                                                        } else {
                                                            $awardstring = "../images/awards/badges/" . $awardresults['awardfilename'] . ".png";
                                                        }
                                                        echo "<tr>";
                                                        echo "<td>" . $record['awarddate'] . "</td>";
                                                        echo "<td><img src=\"" . $awardstring . "\" width=\"100px\"></td>";
                                                        echo "<td>Awarded the " . $awardresults['awardname'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="records">
                                        <table class="table table-dark table-striped align-middle table-sm">
                                            <thead>
                                                <th>Date</th>
                                                <th></th>
                                                <th>Citation</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $recordquery = "SELECT * FROM records WHERE memberID=" . $_GET['id'] . " ORDER BY recorddate desc";
                                                    $recordresults = mysqli_query($link, $recordquery);
                                                    foreach($recordresults as $record) {
                                                        echo "<tr>";
                                                        echo "<td>" . $record['recorddate'] . "</td>";
                                                        echo buildRecord($record);
                                                        if($record['recordType'] == 2) {
                                                            echo "<td><a href=\"../citation.php?id=" . $record['ID'] . "\">Citation</td>";
                                                        } else {
                                                            echo "<td>-</td>";
                                                        }
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
            </div>
        </div>
    </body>
</html>