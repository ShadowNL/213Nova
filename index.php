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
                <div id="addOpdrachtBtn" type="button" class="btn-addopdracht"
                data-toggle="modal" data-target="#AdminAddOpdrachtModal" VakID="' . $VakID . '">
                    Nieuwe Opdracht
                </div>
            </div>';
}
//Produceer "geen opdrachten" bericht
function genGeenOpdrachtenLabel(){
    //text-align: center; line-height: 20px;
    echo    '<div class="opdrachten-label" style="height: 30px;">
                <div class="label-message nohover">
                    Geen opdrachten gevonden in dit vak
                </div>
            </div>';
}
//Produceer Help text
function genHelpTextLabel(){
    echo    '<div class="opdrachten-label" style="height: 60px;">
                <div class="label-message nohover">
                    Klik in de zwarte zijbalk een vak aan om te beginnen <br>
                    Als de zijbalk niet wordt weergegeven, klik dan op de knop met 3 witte balkjes linksbovenin
                </div>
            </div>';
}
//Produceer opdrachten
function genOpdrachtLabel($OpdrachtID,$VakID,$titel,$omschrijving,$verantwoordelijke,$downloadlink,$userSetSession){
    echo    "<div class='opdrachten-label'>
                <div class='opdrachten-label-header'><b>" . $titel . "</b></div>
                <div class='opdrachten-label-textbox'>" . $omschrijving . "</div>
                <div class='opdrachten-label-teacher'> leraar: " . $verantwoordelijke .
                    "<div class='opdrachten-label-download-btn'>
                        <a href=" . $downloadlink . " download>download</a>
                    </div>";
    //Als user ingelogd is, laat EDIT knop zien
    if ($userSetSession) {
        echo        "<div id='btnEditOpdrachtmodal' class='opdrachten-label-download-btn' VakID='" . $VakID . "' OpdrachtID='" . $OpdrachtID . "' data-toggle=\"modal\" data-target=\"#adminEditModal\">
                        <a href='#'>Edit</a>
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
        genOpdrachtLabel($row['OpdrachtID'], $row['VakID'],$row["Titel"],$row["Omschrijving"],$row["Verantwoordelijke"],$row["Downloadlink"],$userSetSession);
    }

    echo "<script>initEditOpdracht();</script>";
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

