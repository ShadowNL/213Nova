<?php

include 'DatabaseConnection.php';

if( isset($_GET['OpdrachtID'] ) )
{
    $vid = $_GET['VakID'];
    $id = $_GET['OpdrachtID'];
    $sql = "DELETE FROM opdrachten WHERE VAkID =$vid AND OpdrachtID =$id";
    $res = mysqli_query($conStr,$sql) ;//or die("failed " .mysql_error());


}
