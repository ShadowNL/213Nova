<?php
include 'DatabaseConnection.php';

// update SQL information
    $vid = $_GET['VakID'];
    $id = $_GET['OpdrachtID'];
    echo 'hello';
    $newTitel = $_POST['newTitel'];
    $newDownloadlink = $_POST['newDownloadlink'];
    $newOmschrijving = $_POST['newOmschrijving'];

    $sql= "UPDATE opdrachten SET Titel='$newTitel', Downloadlink='$newDownloadlink', Omschrijving='$newOmschrijving'
    WHERE VakID='$vid' AND OpdrachtID='$id'";
    $res=  mysqli_query($conStr, $sql);

    echo "<meta http-equiv='refresh' content='0;url=delete_test.php'>";

