<?php
    $date = $_POST['date'];
    $title = $_POST['title'];

    //Add record to record table
    if(mysqli_query($link, "INSERT INTO events (eventitle, eventdate) VALUES (" . $title . ", " . $date . "')") == false) {
        echo mysqli_error($link);
    } else {
        header("Location: events.php");
    }
?>