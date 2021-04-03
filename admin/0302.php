<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include_once '../config.php'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - MOS</title>
        <?php include '../header.php' ?>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php include_once 'header.php' ?>
        <div class="container-fluid">
            <div class="row">
                <?php include_once 'nav.php'; ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-dark">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2 text-light">0302 - Infantry Officer Course - Career Path</h1>
                        <div class="btn-toolbar mb-2 mb-md-0"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped align-middle table-sm">
                            <thead>
                                <tr>
                                    <th>Time in the Unit</th>
                                    <th>Rank Milestones</th>
                                    <th>Requirements</th>
                                    <th>Typical Roles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>LtCol<br></td>
                                    <td></td>
                                    <td>Battalion Commander</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Maj<br></td>
                                    <td></td>
                                    <td>Battalion Executive Officer<br>Company Commander</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Capt<br></td>
                                    <td></td>
                                    <td>Company Commander<br>Company Executive Officer<br>Weapons Platoon Leader</td>
                                </tr>
                                <tr>
                                    <td>7 Months</td>
                                    <td>1stLt<br></td>
                                    <td></td>
                                    <td>Company Executive Officer<br>Weapons Platoon Leader<br>Infantry Platoon Leader</td>
                                </tr>
                                <tr>
                                    <td>5 Months</td>
                                    <td>2ndLt<br></td>
                                    <td>Complete Infantry Officers Course</td>
                                    <td>Infantry Platoon Leader</td>
                                </tr>
                                <tr>
                                    <td>4 Months</td>
                                    <td>OC<br></td>
                                    <td>E-5 or E-4 with Waiver<br>Infantry MOS<br>Available Slot</td>
                                    <td>Infantry Platoon Leader<br>Weapons Platoon Leader</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2 class="h2 text-light">Further Career Paths</h2>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>