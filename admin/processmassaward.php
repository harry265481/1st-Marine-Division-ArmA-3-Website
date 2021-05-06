<?php
    var_dump($_POST);
    $members = $_POST['member'];
    $curraward = $_POST['curraward']
    foreach($members as $member) {
        if(mysqli_query($link, "INSERT INTO attendance (memberID, awardID, awardDate) VALUES ('" . $member . "', '" . $curraward . "', '" . $curr . "')")) {
            echo mysqli_error($link);
        } else {
            header("Location: members.php");
        }
    }
?>