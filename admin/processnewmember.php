z<?php
  include_once '../config.php';

  $branches = mysqli_query($link, "SELECT branch FROM rank WHERE ID=" . $_POST['rank']);
  $branchrow = mysqli_fetch_row($branches); 
  if($_POST['pilot'] == "1") {
    $pilot = 1;
  } else {
    $pilot = 0;
  }

  
  $insert = "INSERT INTO personnel 
              (FirstName, LastName, rank, DOE, DOR, points, branch, pilot, MOS, position, unitID, status) 
              VALUES ('" . $_POST['firstname'] . "', '" 
                        . $_POST['surname'] . "', '" 
                        . $_POST['rank'] . "', '" 
                        . $_POST['doe'] . "', '" 
                        . $_POST['dor'] . "', '" 
                        . $_POST['points'] . "', '" 
                        . $branchrow[0] . "', '" 
                        . $pilot . "', '" 
                        . $_POST['MOS'] .  "', '" 
                        . $_POST['pos'] . "', '"
                        . $_POST['unit'] .  "', '" 
                        . $_POST['status'] . "')";
  if (mysqli_query($link, $insert)) {
      header("Location: members.php");
    } else {
      echo "Error: " . $insert . "<br>" . mysqli_error($link);
    }
  
?>