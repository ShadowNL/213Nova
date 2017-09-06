<!-- Modal -->
<div id="AdminAddOpdrachtModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-heading-custom" style="background-color:#ffae63; min-height:25px; height:15%;">
                    <div style="color:white; text-align:center; font-weight: bold; font-size:32px;">
                        Add Opdracht
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addopdrachtForm" action="AddOpdracht.php" method="post">
                    <input type="text" name="titel" placeholder="titel" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <input type="text" name="omschrijving" placeholder="omschrijving" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <input type="text" name="downloadlink" placeholder="downloadlink" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="addopdrachtSubmit" class="pull-right btn btn-default" type="submit">add</button>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    $("#addopdrachtSubmit").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'AddOpdracht.php',
            data: { titel: $('#addopdrachtForm').children('[name="titel"]').val(), 
                    omschrijving: $('#addopdrachtForm').children('[name="omschrijving"]').val()},
                    downloadlink: $('addopdrachtForm').children('[name="downloadlink"]').val(),
            success:function(response){
                location.reload();
            }
        });
    });
</script>