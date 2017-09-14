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
                <form id="EditOpdrachtForm" method="post" action="EditOpdrachtSQL.php">
                    <input type="text" id="EditOpdrachtTitle" placeholder="Title" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <input type="text" id="EditOpdrachtOmschrijving" placeholder="Omschrijving" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <input type="text" id="EditOpdrachtDownloadlink" placeholder="Download Link" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button name="EditDeleteVak" id="EditDeleteOpdracht" type="submit" class="btn btn-default pull-right">Delete</button>
                    <button name="SubmitOpdrachtEdit" id="editOpdrachtSubmit" class="pull-right btn btn-default" type="submit">Save</button>
                </form>

            </div>
        </div>

    </div>
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
                alert(lastClickedEditVak);
                location.reload();
            }
        });
    });
</script>