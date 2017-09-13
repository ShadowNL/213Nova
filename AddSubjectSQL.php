<?php
include "DatabaseConnection.php";

$SectorID = $_POST['sector'];// 0 = gonna be get posts
$Vaknaam = $_POST['newvaknaam'];

$sqlAddSubject = "INSERT INTO `vakken`(`SectorID`, `Vaknaam`) VALUES ($SectorID,'$Vaknaam')";

$result = $conStr->query($sqlAddSubject);