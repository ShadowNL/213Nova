<?php
include "DatabaseConnection.php";
session_start();

$VakID = $_POST['vak'];
$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$downloadlink = $_POST['downloadlink'];
$verantwoordelijke = $_SESSION['username'];

echo $VakID, $titel, $omschrijving, $downloadlink, $verantwoordelijke;

//$sqlAddSubject = "INSERT INTO `vakken`(`SectorID`, `Vaknaam`) VALUES ($SectorID,'$Vaknaam')";

//$result = $conStr->query($sqlAddSubject);