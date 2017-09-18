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
<!--button type="button" class="close" data-dismiss="modal">&times;</button-->
<div class="panel-body body-admin-login">
    <div class="form-admin-login">
        <form id="EditOpdrachtForm" method="post" action="EditOpdrachtSQL.php"><br>
        <input type="text" id="EditOpdrachtTitle" class="input-admin-login" value="<?php echo $Titel; ?>"><br><br>
        <input type="text" id="EditOpdrachtOmschrijving" class="input-admin-login" value="<?php echo $Omschrijving; ?>"><br><br>
        <input type="text" id="EditOpdrachtDownloadlink" class="input-admin-login" value="<?php echo $Downloadlink; ?>">
        <!--GETERROR MOET HIER-->
        <!--FORM WORD NIET GESLOTEN-->
    </div>
</div>
<div class="panel-footer footer-admin-login">
    <button type="button" class="button-admin-login pull-left" data-dismiss="modal">Close</button>
    <button name="EditDeleteVak"  class="button-admin-login pull-right" id="EditDeleteOpdracht" type="submit">Delete</button>
    <button name="SubmitOpdrachtEdit" class="pull-right button-admin-login" id="editOpdrachtSubmit" type="submit">Save</button>
</div>
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