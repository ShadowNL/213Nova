<?php
session_start();
include 'DatabaseConnection.php';

 //update SQL information
$vid = $_POST['VakID'];
$id = $_POST['OpdrachtID'];
echo 'hello';
$newTitel = $_POST['newTitel'];
$newDownloadlink = $_POST['newDownloadlink'];
$newOmschrijving = $_POST['newOmschrijving'];

$sqlquery= "UPDATE opdrachten SET Titel= '$newTitel', Downloadlink='$newDownloadlink', Omschrijving='$newOmschrijving'
WHERE VakID=$vid AND OpdrachtID=$id";
$result = $conStr->query($sqlquery);


