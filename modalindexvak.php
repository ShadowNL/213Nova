<?php
include 'DatabaseConnection.php';
$VakID = $_GET['VakeditID'];
$SectorID = $_GET['SectoreditID'];

$GetNamessql = "SELECT * FROM vakken WHERE SectorID=$SectorID AND Vakid=$VakID";
$result = $conStr->query($GetNamessql);
$row = $result->fetch_assoc();
$VakNaam = $row['Vaknaam'];
?>
<form id="vakEditForm" method="post" action="EditSubjectSQL.php">
    <input type="text" name="newvaknaam" value="<?php echo $VakNaam; ?>" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button name="EditDeleteVak" id="EditDeleteVak" type="submit" class="btn btn-default pull-right">Delete</button>
    <button name="submitedit" id="editVakSubmit" class="pull-right btn btn-default" type="submit">Save</button>
</form>
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