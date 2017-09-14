<?php
session_start();
include "DatabaseConnection.php";

$vakid = $_POST["vakid"];
$sectorid = $_POST["sectorid"];

$SqlDeleteVak = "DELETE FROM vakken WHERE VakID = $vakid AND SectorID = $sectorid";

$_SESSION['foook'] = $SqlDeleteVak;

$result = mysqli_query($conStr,$SqlDeleteVak);
?>
