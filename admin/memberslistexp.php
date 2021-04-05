<?php
$battunits = mysqli_query($link, "SELECT * FROM units WHERE parents=''");
foreach($battunits as $batt) {
    echo "<div class=\"card card-body\">";
    echo $batt['unitname'];
    $compunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $batt['ID']);
    foreach($compunits as $comp) {
        echo "<div class=\"card card-body\">";
        echo $comp['unitname'];
        $platunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $comp['ID']);
        foreach($platunits as $plat) {
            echo "<div class=\"card card-body\">";
            echo $plat['unitname'];
            $squadunits = mysqli_query($link, "SELECT * FROM units WHERE parents=" . $plat['ID']);
            foreach($squadunits as $squad) {
                echo "<div class=\"card card-body\">";
                echo $squad['unitname'];
                echo "</div>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}

/************** */
$results = mysqli_query($link, "SELECT * FROM personnel");
foreach ($results as $result)  {
    $statusrow = mysqli_fetch_row(mysqli_query($link, "SELECT * FROM status WHERE ID=" . $result['status']));
    $imagename = getMemberRankAbbrev($result['ID']);

    $branch;
    if($result['branch'] == 0) {
        $branch = "marine";
    } else if($result['branch'] == 1) {
        $branch = "navy";
    }
    $imagestring = "../images/ranks/" . $branch . "/small/" . $imagename;

    echo "<tr>";
    echo    "<td><img class=\"mx-auto d-block\" height=\"30px\" src=" . $imagestring . ".png></td>";
    echo    "<td>" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
    echo    "<td><span class=\"badge rounded-pill bg-" . $statusrow[2] . " text-" . $statusrow[3] . "\">" . $statusrow[1] . "</span></td>";
    echo    "<td>" . $abbrevrow[0] . "</td>";
    echo    "<td>" . $result['DOE'] . "</td>";
    echo    "<td>";
    echo        "<div class=\"dropdown\">";
    echo            "<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"></button>";
    echo            "<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">";
    echo                "<li><a class=\"dropdown-item\" href=\"promote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-up\"></i> Promote</a></li>";
    echo                "<li><a class=\"dropdown-item\" href=\"demote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-down\"></i> Demote</a></li>";
    echo                "<li><a class=\"dropdown-item\" href=\"transfer.php?id=" . $result['ID'] . "\"><i class=\"fas fa-arrows-alt-h\"></i> Transfer</a></li>";
    echo                "<li><a class=\"dropdown-item\" href=\"graduate.php?id=" . $result['ID'] . "\"><i class=\"fas fa-graduation-cap\"></i> Graduation</a></li>";
    echo                "<li><a class=\"dropdown-item\" href=\"discharge.php?id=" . $result['ID'] . "\"><i class=\"fas fa-user-clock\"></i> LOA</a></li>";
    echo                "<li><a class=\"dropdown-item\" href=\"award.php?id=" . $result['ID'] . "\"><i class=\"fas fa-times-circle\"></i> Discharge</a></li>";
    echo            "</ul>";
    echo        "</div>";
    echo    "</td>";
    echo    "<td><a class=\"text-light\" href=\"../member.php?id=" . $result['ID'] . "\"><i class=\"fas fa-id-badge\"></i></a></td>";
    echo "</tr>";
}
?>

<table class="table table-dark table-striped align-middle table-sm">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Status</th>
            <th>Rank</th>
            <th>Join Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>