<?php
session_start();
include 'DatabaseConnection.php';

 //update SQL information
$vid = $_POST['VakID'];
$id = $_POST['OpdrachtID'];
$newTitel = $_POST['Titel'];
$newDownloadlink = $_POST['Downloadlink'];
$newOmschrijving = $_POST['Omschrijving'];

$sqlquery= "UPDATE opdrachten SET Titel= '$newTitel', Downloadlink='$newDownloadlink', Omschrijving='$newOmschrijving'
WHERE VakID=$vid AND OpdrachtID=$id";
$result = $conStr->query($sqlquery);

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/General.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>