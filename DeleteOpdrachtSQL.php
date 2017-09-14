<?php
include 'DatabaseConnection.php';

    $vid = $_POST['Delvakid'];
    $id = $_POST['DelOpdrachtID'];
    $sqlDeleteOpdracht = "DELETE FROM opdrachten WHERE VAkID =$vid AND OpdrachtID =$id";

    $res = mysqli_query($conStr,$sqlDeleteOpdracht) ;//or die("failed " .mysql_error());

