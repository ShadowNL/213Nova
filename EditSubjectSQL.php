<?php
session_start();
include 'DatabaseConnection.php';
$vaknaam = $_POST["newvaknaam"];
$vakid = $_POST["vakid"];
$sectorid = $_POST["sector"];

$editsubjectsql = "UPDATE vakken SET Vaknaam = '$vaknaam' WHERE VakID = $vakid AND SectorID = $sectorid";
//$_SESSION[' editsql']=$editsubjectsql;
$result = $conStr->query($editsubjectsql);