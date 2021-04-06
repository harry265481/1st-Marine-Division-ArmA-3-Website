<?php
include_once 'session.php';
include_once '../config.php';

$row = mysqli_fetch_row(mysqli_query($link, "SELECT * FROM personnel WHERE ID=" . $_GET['id']));
$shortname = substr($row[1], 0, 1) . ". " . $row[2];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Transfer</title>
        <?php include '../header.php' ?>
    </head>
    <body class="bg-dark">
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <form method="post" action="processgraduate.php?id=<?php echo $_GET['id'] ?>">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2 text-light">Graduate - <?php echo $shortname ?></h1>
                            <div class="btn-toolbar mb-2 mb-md-0"></div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="text-light">
                                    
                                </div>
                            </div>
                            <div class="col-md">
                                <select class="form-select text-dark" id="course" name="course">
                                    <?php 
                                        $courses = mysqli_query($link, "SELECT * FROM courses");
                                        foreach($courses as $course) {
                                            echo "<option value=\"" . $course['ID'] . "\">" . $course['coursename'] . "</option>";
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