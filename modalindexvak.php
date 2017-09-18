<?php
include 'DatabaseConnection.php';
$VakID = $_GET['VakeditID'];
$SectorID = $_GET['SectoreditID'];

$GetNamessql = "SELECT * FROM vakken WHERE SectorID=$SectorID AND Vakid=$VakID";
$result = $conStr->query($GetNamessql);
$row = $result->fetch_assoc();
$VakNaam = $row['Vaknaam'];
?>
<<<<<<< HEAD
<div class="panel-body body-admin-login">
    <div class="form-admin-login">
        <form id="vakEditForm" method="post" action="EditSubjectSQL.php">
            <input type="text" name="newvaknaam" value="<?php echo $VakNaam; ?>" placeholder="vaknaam" class="input-admin-login"><br><br>
    </div>
</div>
<div class="panel-footer footer-admin-login">
    <button type="button" class="pull-left button-admin-login" data-dismiss="modal">Annuleren</button>
    <button name="EditDeleteVak" id="EditDeleteVak" type="submit" class="pull-right button-admin-login">Verwijderen</button>
    <button name="submitedit" id="editVakSubmit" class="pull-right button-admin-login" type="submit">Opslaan</button>
</div>

<script>
    $('#editVakSubmit').click(function(e) {
        console.log($('#vakEditForm').children('[name="newvaknaam"]').val());
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'EditSubjectSQL.php',
            data: { newvaknaam: $('#vakEditForm').children('[name="newvaknaam"]').val(),
                sector:LastClickedEditSector,
                vakid:lastClickedEditVak},

            success:function(response){
                alert($('#vakEditForm').children('[name="newvaknaam"]').val());
                console.log(lastClickedEditVak,LastClickedEditSector);
                location.reload();
            }
        });
    });

    $('#EditDeleteVak').click(function (e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'DeleteSubjectSQL.php',
            data: {sectorid:LastClickedEditSector,
                vakid:lastClickedEditVak},

            success:function(response){
                alert(LastClickedEditSector);
                //console.log(lastClickedEditVak,LastClickedEditSector);
                location.reload();
            }
        });
    });