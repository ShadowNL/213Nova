<?php
session_start();
include 'DatabaseConnection.php';

if (isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
} else {
    $SectorID = 0;
}
if (isset($_GET['VakID'])) {
    $VakID = $_GET['VakID'];
} else {
    $VakID = 0;
}


global $conStr;
global $SectorID;
global $VakID;
$sqlNav = "SELECT * FROM opdrachten WHERE VakID =" . $VakID;
$result = $conStr->query($sqlNav);

$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link);
$urlpart = end($link_array);
if ($result && $result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($urlpart === "4_adminoverview.php") {
            echo "<center>
                    <table>
                        <tr>
                            <td>
                                <div class='opdrachten-label-admin'>
                                    <b>" . $row["Titel"] . "</b>
                                </div>  
                            </td>
                            <td>
                                <button type=\"button\" class=\"btn btn-info btn-lg\" id=\"myBtn\" value='" . $row['OpdrachtID'] . "' name='Edit,' style=\"background-color: transparent!important\">Open Modal</button>
                            </td>
                            <td>
                                <div class='button-delete-admin'>
                                    delete
                                </div>
                            </td>
                        </tr>
                    </table>       
                 </center>";
        } else {
            echo "<div class='opdrachten-label'>
                    <div class='opdrachten-label-header'><b>" . $row["Titel"] . "</b></div>
                        <div class='opdrachten-label-textbox'>" . $row["Omschrijving"] . "</div>
                        <div class='opdrachten-label-teacher'> leraar: " . $row["Verantwoordelijke"] .
                            "<div class='opdrachten-label-download-btn'>
                                <a href=" . $row["Downloadlink"] . " download>download</a>
                             </div>
                        </div>
                    </div>  ";
        }
    }
} else {
    if ($VakID != 0) {
        echo "Geen opdrachten in dit vak gevonden";
    }
}


?>
