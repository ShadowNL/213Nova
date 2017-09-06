<!-- Modal -->
<div id="addVakModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-heading-custom" style="background-color:#ffae63; min-height:25px; height:15%;">
                    <div style="color:white; text-align:center; font-weight: bold; font-size:32px;">
                        Vak toevoegen
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="vakForm">
                    <input type="text" name="vak" placeholder="Vak naam" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="vakSubmit" class="pull-right btn btn-default" type="submit">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    $("#vakSubmit").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'AddSubjectSQL.php',
            data: { vak: $('#vakForm').children('[name="vak"]').val(), sector: <?php echo $_GET['SectorID']; ?>},
            success:function(response){
                location.reload();
            }
        });
    });
</script>