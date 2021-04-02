<?php 
    include_once 'config.php';
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $discord = $_POST['discord'];
    $dob = $_POST['dob'];
    $referrer = $_POST['referrer'];
    $steamid = $_POST['steamid'];
    $platoon = $_POST['platoon'];
    $career = $_POST['career'];
    $veteran = $_POST['veteran'];
    $otherunits = $_POST['otherunits'];
    $method = $_POST['referralselect'];

    $sql = "INSERT INTO applications (firstname, surname, discord, dob, referrer, steamid, platoon, career, veteran, otherunits, appstatus, method) VALUES ('" . $firstname . "', '" . $surname . "', '" . $discord . "', '" . $dob . "', '" . $referrer . "', '" . $steamid . "', '" . $platoon . "', '" . $career . "', '" . $veteran . "', '" . $otherunits . "', 0, '" . $method . "')";
    if (mysqli_query($link, $sql)) {
        header( "refresh:5;url=index.php" );
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
?> 