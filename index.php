<?php
session_start();
include 'DatabaseConnection.php';
$SectorID = 0;
$VakID = 0;
if (isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
}
if (isset($_GET['VakID'])) {
    $VakID = $_GET['VakID'];
}

global $conStr;
global $SectorID;
global $VakID;
$sqlNav = "SELECT * FROM opdrachten WHERE VakID = " . $VakID;
$result = $conStr->query($sqlNav);

$userSetSession = isset($_SESSION['username']);
//Als er opdrachten in het huidige vak staan:
if ($result && $result->num_rows > 0) {
    //Als user ingelogd is, voeg knop toe, AddOpdracht
    if ($userSetSession) {
        //Produceer AddOpdracht-knop
        echo    '<div class="opdrachten-label" style="height: 30px;">
                    <div id="addOpdrachtBtn" type="button" class="opdrachten-label-header" data-toggle="modal" 
                     data-target="#AdminAddOpdrachtModal" VakID="' . $VakID . '" style="text-align: center; line-height: 20px;">
                        <a href="#" class="btn-addopdracht">triggert</a>
                        
                    </div>
                </div>';
    }
    //Genereer html voor alle opdrachten in het huidige vak
    while ($row = $result->fetch_assoc()) {
        //produceer opdracht-labels
        echo    "<div class='opdrachten-label'>
                    <div class='opdrachten-label-header'><b>" . $row["Titel"] . "</b></div>
                    <div class='opdrachten-label-textbox'>" . $row["Omschrijving"] . "</div>
                    <div class='opdrachten-label-teacher'> leraar: " . $row["Verantwoordelijke"] .
                        "<div class='opdrachten-label-download-btn'>
                            <a href=" . $row["Downloadlink"] . " download>download</a>
                        </div>";
        //Als user ingelogd is, laat EDIT knop zien
        if ($userSetSession) {
            echo        "<div class='opdrachten-label-download-btn' data-toggle=\"modal\" data-target=\"#adminLoginModal\">
                            <a href=\"#\">Edit</a>
                        </div>";
        }
        echo        "</div>
                </div>";
    }
//Als er geen opdrachten gevonden zijn:
} else {
    //als er een vak is geselecteerd, geef bericht dat er geen opdrachten zijn
    if ($VakID != 0) {
        echo    '<div class="opdrachten-label" style="height: 30px;">
                    <div class="opdrachten-label-header"   style="text-align: center; line-height: 20px;">
                        <div class=btn-addopdracht>Geen opdrachten gevonden in dit vak
                        </div>
                    </div>
                </div>';
        //Als user is ingelogd, geef ook add-opdrachtknop weer
        if ($userSetSession) {
            echo    '<div class="opdrachten-label" style="height: 30px;">
                        <div id="addOpdrachtBtn" type="button" class="opdrachten-label-header" data-toggle="modal" 
                         data-target="#AdminAddOpdrachtModal" VakID="' . $VakID . '" style="text-align: center; line-height: 20px;">
                            <a href="#" class="btn-addopdracht">triggert</a>
                        </div>
                    </div>';
        }
    //Als er geen vak geselecteerd is, geef helptext weer
    } else {
        echo    '<div class="opdrachten-label" style="height: 70px;">
                    <div class="opdrachten-label-header"   style="height: 70px; text-align: center; line-height: 20px;">
                        <div class=opdrachten-label-header style="text-align: center"><h4>Om opdrachten te kunnen downloaden en of bekijken<br>moet u eerst nog uw vak kiezen</h4>
                        </div>
                    </div>
                </div>';
    }
}
?>