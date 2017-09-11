<!-- Modal -->
<div id="AdminEditVakModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-heading-custom" style="background-color:#ffae63; min-height:25px; height:15%;">
                    <div style="color:white; text-align:center; font-weight: bold; font-size:32px;">
                        Vak weizigen
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="vakEditForm" method="post" action="EditSubjectSQL.php">
                    <input type="text" name="newvaknaam" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button name="submitedit" id="editVakSubmit" class="pull-right btn btn-default" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
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
</script>