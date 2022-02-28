<?php
include_once 'session.php';
include_once '../config.php';

$row = mysqli_fetch_row(mysqli_query($link, "SELECT FirstName, LastName FROM personnel WHERE ID=" . $_GET['id']));
$shortname = substr($row[0], 0, 1) . ". " . $row[1];
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
                    <form method="post" action="processaward.php?id=<?php echo $_GET['id'] ?>">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Award - <?php echo $shortname ?></h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="award" name="award">
                                    <?php 
                                        $awards = mysqli_query($link, "SELECT ID, awardname FROM awards");
                                        foreach($awards as $award) {
                                            echo "<option value=\"" . $award['ID'] . "\">" . $award['awardname'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md"></div>
                            <div class="col-md">
                                <input type="date" class="form-control" value=<?php $date = date("Y-m-d"); echo "\"" . $date . "\""; ?> name="date">
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