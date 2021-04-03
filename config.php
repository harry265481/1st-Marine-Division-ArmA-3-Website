<?php
    define('DB_SERVER', '199.188.200.231');
    define('DB_USERNAME', 'rstmgvqt_1stmardiv');
    define('DB_PASSWORD', '&gnHrcG3eJzGN7iQP8LmYG');
    define('DB_NAME', 'rstmgvqt_1stmardiv');

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>