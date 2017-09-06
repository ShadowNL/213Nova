<?php
include "DatabaseConnection.php";
session_start();

$VakID = $_POST['vak'];
$OpdrachtID = 0;
$titel = $_POST['titel'];
$omschrijving = $_POST['omschrijving'];
$downloadlink = $_POST['downloadlink'];
$verantwoordelijke = $_SESSION['username'];

$sqlAddSubject = "INSERT INTO `opdrachten`(`VakID`, `Titel`,`Omschrijving`, `Downloadlink`,`Verantwoordelijke`) VALUES ('$VakID','$titel','$omschrijving','$downloadlink','$verantwoordelijke')";

$result = $conStr->query($sqlAddSubject);