<?php
session_start();
include 'DatabaseConnection.php';

if (isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
} else {
    $SectorID = 0;
}
if (isset($_GET['VakID'])) {
    $VakID = $_GET['VakID'];
} else {
    $VakID = 0;
}


global $conStr;
global $SectorID;
global $VakID;

$sqlNav = "SELECT * FROM opdrachten WHERE VakID = " . $VakID;
$result = $conStr->query($sqlNav);

if ($result && $result->num_rows > 0) {

    //admin add vak
    if (isset($_SESSION['username'])) {
        echo '<div class="opdrachten-label" style="height: 30px;">
 <div id="addOpdrachtBtn" type="button" class="opdrachten-label-header" data-toggle="modal" data-target="#AdminAddOpdrachtModal" VakID="'.$VakID.'" style="text-align: center; line-height: 20px;">
 <a href="#" class="btn-addopdracht">triggert</a>
 </div>
</div>';
    }

    while ($row = $result->fetch_assoc()) {
        echo "<div class='opdrachten-label'>
                    <div class='opdrachten-label-header'><b>" . $row["Titel"] . "</b>
                        <div type=\"button\" class=\"nav navbar-nav pull-right\" data-toggle=\"modal\" data-target=\"#adminLoginModal\"><li><a href=\"#\">Edit</a></li></div></div>
                        <div class='opdrachten-label-textbox'>" . $row["Omschrijving"] . "</div>
                        <div class='opdrachten-label-teacher'> leraar: " . $row["Verantwoordelijke"] .
            "<div class='opdrachten-label-download-btn'>
                        <a href=" . $row["Downloadlink"] . " download>download</a>
                     </div>
                </div>
            </div>  ";
    }
} else {
    if ($VakID != 0) {
        echo "Geen opdrachten in dit vak gevonden";
        if (isset($_SESSION['username'])) {
            echo '<div class="opdrachten-label" style="height: 30px;">
 <div id="addOpdrachtBtn" type="button" class="opdrachten-label-header" data-toggle="modal" data-target="#AdminAddOpdrachtModal" VakID="' . $VakID . '" style="text-align: center; line-height: 20px;">
 <a href="#" class="btn-addopdracht">triggert</a>
 </div>
</div>';
        }
    }
}


?>
