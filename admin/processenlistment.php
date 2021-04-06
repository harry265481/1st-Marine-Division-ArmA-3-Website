<?php
  include_once '../config.php';

  $firstname = $_POST['firstname'];
  $surname = $_POST['surname'];
  $rank = $_POST['rank'];
  $MOS = $_POST['MOS'];
  $status = $_POST['submit'];

  $branchquery = "SELECT branch FROM rank WHERE ID=" . $rank;
  $branches = mysqli_query($link, $branchquery);
  $branchrow = mysqli_fetch_row($branches);
  $today = date("Y-m-d");
  $branch = $branchrow[0];

  
  $update = "UPDATE applications SET appstatus = " . $status . " WHERE ID=" . $_GET['id'];
  mysqli_query($link, $update);
  if($status = 1) {
  $insert = "INSERT INTO personnel 
              (FirstName, LastName, rank, DOE, DOR, points, branch, pilot, MOS, position) 
              VALUES ('" . $firstname . "', '" . $surname . "', '" . $rank . "', '" . $today . "', '" . $today . "', '0', '" . $branch . "', '0', '" . $MOS .  "', 'Recruit')";
  if (mysqli_query($link, $insert)) {
      header( "refresh:5;url=members.php" );
      echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
  } else {
    header( "refresh:5;url=.php" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="members.php">here</a>.';
  }
?>