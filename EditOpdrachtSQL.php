<?php
session_start();
include 'DatabaseConnection.php';

//update SQL information
$vid = $_POST['vakid'];
$id = $_POST['OpdrachtID'];
$newTitel = $_POST['Title'];
$newDownloadlink = $_POST['DownloadLink'];
$newOmschrijving = $_POST['Omschrijving'];

$sqlquery= "UPDATE opdrachten SET Titel= '$newTitel', Downloadlink='$newDownloadlink', Omschrijving='$newOmschrijving'
WHERE VakID=$vid AND OpdrachtID=$id";

$result = $conStr->query($sqlquery);