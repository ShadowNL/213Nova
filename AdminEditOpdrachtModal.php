<?php
include 'DatabaseConnection.php';

// SQL first table summon
$sql = "SELECT VakID, OpdrachtID, Titel, Omschrijving, Downloadlink FROM opdrachten";

$result = mysqli_query($conStr,$sql);

// get TH names
$finfo0 = mysqli_fetch_field_direct($result, 0);
$finfo1 = mysqli_fetch_field_direct($result, 1);
$finfo2 = mysqli_fetch_field_direct($result, 2);
$finfo3 = mysqli_fetch_field_direct($result, 3);
$finfo4 = mysqli_fetch_field_direct($result, 4);


?>


<!-- Modal -->
<div id="adminEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-heading-custom" style="background-color:#ffae63; min-height:25px; height:15%;">
                    <div style="color:white; text-align:center; font-weight: bold; font-size:32px;">
                        <br>
                        Opdracht wijzigen
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <?php
                echo "<table><thead>";
                echo
                    "<tr>".
                    "<th width='200'>" . "$finfo0->name" . "</th>".
                    "<th width='200'>" . "$finfo1->name" . "</th>".
                    "<th width='200'>" . "$finfo2->name" . "</th>".
                    "<th width='200'>" . "$finfo3->name" . "</th>".
                    "<th width='200'>" . "$finfo4->name" . "</th>".
                    "</tr></thead><tbody>";

                // places data
                while($row = $result->fetch_assoc()) {
                    echo
                        "<tr>".
                        "<td width='200'>"  .$row["VakID"] . "</td>".
                        "<td width='200'>" . $row["OpdrachtID"] . "</td>".
                        "<td width='200'>" . $row["Titel"] . "</td>".
                        "<td width='200'>" . $row["Omschrijving"] . "</td>".
                        "<td width='200'>" . $row["Downloadlink"] . "</td>".
                       //"<th width='200'>" . "<a href='delete_opdracht.php?OpdrachtID=".$row['OpdrachtID']."&VakID=".$row['VakID']."'> Delete </a>" . "</th>".
                        // "<th width='200'>" . "<a href='edit.php?OpdrachtID=" . $row['OpdrachtID'] . "&VakID=" . $row['VakID'] . '&rest=' . $row['Titel']. $row['Omschrijving']. $row['Downloadlink'] ."'> Edit </a>" . "</th>".
                        "</tr>"; }
                echo "</tbody></table>";

                ?>
            <!--    <form id="loginForm" action="redirect.php" method="post">
                    <input type="text" name="user" placeholder="Gebruikersnaam" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <input type="password" name="pass" placeholder="Wachtwoord" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="loginSubmit" class="pull-right btn btn-default" type="submit">Login</button>
                </form>-->
                </br>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="float: right;">Save</button>
            </div>
        </div>

    </div>
</div>


<script>
    $("#loginSubmit").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'redirect.php',
            data: { user: $('#loginForm').children('[name="user"]').val(), pass: $('#loginForm').children('[name="pass"]').val()},
            success:function(response){
                location.reload();
            }
        });
    });
</script>