<?php
include 'DatabaseConnection.php';


// SQL first table summon
$sql = "SELECT VakID, OpdrachtID, Titel, Omschrijving, Downloadlink FROM opdrachten";

$result = mysqli_query($conStr,$sql);

// get TH namesi
$finfo0 = mysqli_fetch_field_direct($result, 0);
$finfo1 = mysqli_fetch_field_direct($result, 1);
$finfo2 = mysqli_fetch_field_direct($result, 2);
$finfo3 = mysqli_fetch_field_direct($result, 3);

// place TH names
echo "<table><thead>";
echo
    "<tr>".
    "<th width='200'>" . "$finfo0->name" . "</th>".
    "<th width='200'>" . "$finfo1->name" . "</th>".
    "<th width='200'>" . "$finfo2->name" . "</th>".
    "<th width='200'>" . "$finfo3->name" . "</th>".
    "<th width='200'>" . "Delete" . "</th>".
    "<th width='200'>" . "Edit" . "</th>".
    "</tr></thead><tbody>";

// places data
while($row = $result->fetch_assoc()) {
    echo
        "<tr>".
        "<td width='200'>"  .$row["VakID"] . "</td>".
        "<td width='200'>" . $row["OpdrachtID"] . "</td>".
        "<td width='200'>" . $row["Titel"] . "</td>".
        "<td width='200'>" . $row["Omschrijving"] . "</td>".
        "<th width='200'>" . "<a href='delete.php?OpdrachtID=".$row['OpdrachtID']."&VakID=".$row['VakID']."'> Delete </a>" . "</th>".
        "<th width='200'>" . "<a href='edit.php?OpdrachtID=" . $row['OpdrachtID'] . "&VakID=" . $row['VakID'] . '&rest=' . $row['Titel']. $row['Omschrijving']. $row['Downloadlink'] ."'> Edit </a>" . "</th>".
        "</tr>"; }
echo "</tbody></table>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/General.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


