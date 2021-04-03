<?php
<<<<<<< HEAD
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '1stmardiv');
=======
    define('DB_SERVER', '199.188.200.231');
    define('DB_USERNAME', 'rstmgvqt_1stmardiv');
    define('DB_PASSWORD', '&gnHrcG3eJzGN7iQP8LmYG');
    define('DB_NAME', 'rstmgvqt_1stmardiv');
>>>>>>> fcaaa392df0c1a7c29ca6ef0eb16ced16e8f0d27

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>