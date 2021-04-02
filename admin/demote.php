<?php
include_once 'session.php';
include_once '../config.php';

$query = "SELECT * FROM personnel WHERE ID=" . $_GET['id'];
$results = mysqli_query($link, $query);
$row = mysqli_fetch_row($results);
$firstname = $row[1];
$surname = $row[2];
$rank = $row[3];
$shortname = substr($firstname, 0, 1) . ". " . $surname;
$rankquery = "SELECT rank_name FROM rank WHERE ID=" . $rank;
$rankrow = mysqli_fetch_row(mysqli_query($link, $rankquery));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Demote</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
        <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <form method="post" action="processpromote.php?id=<?php echo $_GET['id'] ?>"">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Demote - <?php echo $shortname ?></h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    <h4>Current Rank: <?php echo $rankrow[0] ?></h4>
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="rank" name="rank">
                                    <?php 
                                        $rankquery = "SELECT ID, rank_name FROM rank";
                                        $ranks = mysqli_query($link, $rankquery);
                                        foreach($ranks as $rank) {
                                            echo "<option value=\"" . $rank['ID'] . "\">" . $rank['rank_name'] . "</option>";
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