<?php
include 'DatabaseConnection.php';
$VakID = $_GET['VakeditID'];
$SectorID = $_GET['SectoreditID'];

$GetNamessql = "SELECT * FROM vakken WHERE SectorID=$SectorID AND Vakid=$VakID";
$result = $conStr->query($GetNamessql);
$row = $result->fetch_assoc();
$VakNaam = $row['Vaknaam'];
?>
<!--button type="button" class="close" data-dismiss="modal">&times;</button-->
<div class="panel-body body-admin-login">
    <div class="form-admin-login">
        <form id="vakEditForm" method="post" action="EditSubjectSQL.php">
        <input type="text" name="newvaknaam" value="<?php echo $VakNaam; ?>" class="input-admin-login"><br><br>
        <!--GETERROR MOET HIER-->
        <!--FORM WORD NIET GESLOTEN-->
    </div>
</div>
<div class="panel-footer footer-admin-login">
    <button type="button" class="pull-left button-admin-login" data-dismiss="modal">Close</button>
    <button name="EditDeleteVak" class="pull-right button-admin-login" id="EditDeleteVak" type="submit">Delete</button>
    <button name="submitedit" class="pull-right button-admin-login" id="editVakSubmit" type="submit">Save</button>
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