<?php
    var_dump($_POST);
    $members = $_POST['member'];
    $curraward = $_POST['curraward'];
    $date = $_POST['date'];
    foreach($members as $member) {
        if(mysqli_query($link, "INSERT INTO awardrecord (memberID, awardID, awarddate) VALUES ('" . $member . "', '" . $curraward . "', '" . $date . "')")) {
            echo mysqli_error($link);
        } else {
            header("Location: members.php");
        }
    }
?>