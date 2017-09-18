<?php
include 'DatabaseConnection.php';
$VakID = $_GET['VakID'];
$OpdrachtID = $_GET['OpdrachtID'];

$GetNamesSQL = "SELECT * FROM opdrachten WHERE Vakid=$VakID AND OpdrachtID=$OpdrachtID";
$result = $conStr->query($GetNamesSQL);
$row = $result->fetch_assoc();
$Titel = $row['Titel'];
$Omschrijving = $row['Omschrijving'];
$Downloadlink = $row['Downloadlink'];


?>
<form id="EditOpdrachtForm" method="post" action="EditOpdrachtSQL.php">
    <input type="text" id="EditOpdrachtTitle" value="<?php echo $Titel; ?>" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
    <input type="text" id="EditOpdrachtOmschrijving" value="<?php echo $Omschrijving; ?>" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
    <input type="text" id="EditOpdrachtDownloadlink" value="<?php echo $Downloadlink; ?>" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>

    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button name="EditDeleteVak" id="EditDeleteOpdracht" type="submit" class="btn btn-default pull-right">Delete</button>
    <button name="SubmitOpdrachtEdit" id="editOpdrachtSubmit" class="pull-right btn btn-default" type="submit">Save</button>
</form>
<script>
    $("#editOpdrachtSubmit").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'EditOpdrachtSQL.php',
            data: { Title: $('#EditOpdrachtTitle').val(),
                Omschrijving: $('#EditOpdrachtOmschrijving').val(),
                DownloadLink: $('#EditOpdrachtDownloadlink').val(),
                vakid:lastClickedEditVak,
                OpdrachtID: LastClickedEditOpdracht},


            success:function(response){
                alert(lastClickedEditVak,LastClickedEditOpdracht);
                location.reload();
            }
        });
    });

    $("#EditDeleteOpdracht").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'DeleteOpdrachtSQL.php',
            data: { Delvakid:lastClickedEditVak,
                DelOpdrachtID: LastClickedEditOpdracht},


            success:function(response){
                alert(LastClickedEditOpdracht);
                location.reload();

            }
        });
    });
</script>