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

//Produceer AddOpdracht-knop
function genAddOpdrachtButton($VakID){
    echo    '<div class="opdrachten-label" style="height: 30px;">
                <div id="addOpdrachtBtn" type="button" class="btn-addopdracht" data-toggle="modal" 
                 data-target="#AdminAddOpdrachtModal" VakID="' . $VakID . '">
                    Nieuwe Opdracht
                </div>
            </div>';
}
//Produceer "geen opdrachten" bericht
function genGeenOpdrachtenLabel(){
    echo    '<div class="opdrachten-label" style="height: 30px;">
                <div class="opdrachten-label-header"   style="text-align: center; line-height: 20px;">
                    <div class=btn-addopdracht>Geen opdrachten gevonden in dit vak
                    </div>
                </div>
            </div>';
}
//Produceer Help text
function genHelpTextLabel(){
    echo    '<div class="opdrachten-label" style="height: 70px;">
                <div class="opdrachten-label-header"   style="height: 70px; text-align: center; line-height: 20px;">
                    <div class=opdrachten-label-header style="text-align: center"><h4>Om opdrachten te kunnen downloaden en of bekijken<br>moet u eerst nog uw vak kiezen</h4>
                    </div>
                </div>
            </div>';
}
//Produceer opdrachten
function genOpdrachtLabel($titel,$omschrijving,$verantwoordelijke,$downloadlink,$userSetSession){
    echo    "<div class='opdrachten-label'>
                <div class='opdrachten-label-header'><b>" . $titel . "</b></div>
                <div class='opdrachten-label-textbox'>" . $omschrijving . "</div>
                <div class='opdrachten-label-teacher'> leraar: " . $verantwoordelijke .
                    "<div class='opdrachten-label-download-btn'>
                        <a href=" . $downloadlink . " download>download</a>
                    </div>";
    //Als user ingelogd is, laat EDIT knop zien
    if ($userSetSession) {
        echo        "<div class='opdrachten-label-download-btn' data-toggle=\"modal\" data-target=\"#adminEditModal\">
                        <a href=\"#\">Edit</a>
                    </div>";
    }
    echo        "</div>
            </div>";
}

//Als er opdrachten in het huidige vak staan:
if ($result && $result->num_rows > 0) {
    //Als user ingelogd is, voeg knop toe, AddOpdracht
    if ($userSetSession) {
        genAddOpdrachtButton($VakID);
    }
    //Genereer html voor alle opdrachten in het huidige vak
    while ($row = $result->fetch_assoc()) {
        //produceer opdracht-labels
        genOpdrachtLabel($row["Titel"],$row["Omschrijving"],$row["Verantwoordelijke"],$row["Downloadlink"],$userSetSession);
    }
//Als er geen opdrachten gevonden zijn:
} else {
    //als er een vak is geselecteerd, geef bericht dat er geen opdrachten zijn
    if ($VakID != 0) {
        genGeenOpdrachtenLabel();
        //Als user is ingelogd, geef ook add-opdrachtknop weer
        if ($userSetSession) {
            genAddOpdrachtButton($VakID);
        }
    //Als er geen vak geselecteerd is, geef helptext weer
    } else {
        genHelpTextLabel();
    }
}
?>