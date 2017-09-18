<!-- Modal -->
<div id="AdminAddOpdrachtModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-admin-login">

        <!-- Modal content-->
        <div class="panel-heading-custom header-admin-login">
            <div class="headertext-admin-login">
                Add Opdracht
            </div>
        </div>
        <div class="panel-body body-admin-login">
            <div class="form-admin-login">
                <form id="addopdrachtForm" action="AddOpdrachtSQL.php" method="post"><br>
                <input type="text" id="addtitel" class="input-admin-login" name="titel" placeholder="titel"><br><br>
                <input type="text" id="addomschrijving" class="input-admin-login" name="omschrijving" placeholder="omschrijving"><br><br>
                <input type="text" id="adddownload" class="input-admin-login" name="downloadlink" placeholder="downloadlink">
            </div>
        </div>
        <div class="panel-footer footer-admin-login">
                <button type="button" class="pull-left button-admin-login" data-dismiss="modal">Close</button>
                <button id="addopdrachtSubmit" class="pull-right button-admin-login" type="submit">save</button>
        </div>
    </div>
</div>
<script>
    $("#addopdrachtSubmit").click(function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'AddOpdrachtSQL.php',
            data: {
                titel: $('#addtitel').val(),
                omschrijving: $('#addomschrijving').val(),
                downloadlink: $('#adddownload').val(),
                vak:$('#addOpdrachtBtn').attr('vakid'),
            },
            success: function(response){
                console.log($('#addtitel').val());
                console.log($('#addomschrijving').val());
                console.log($('#adddownload').val())
                alert($('#addOpdrachtBtn').attr('vakid'));
                location.reload();

            }
        });
    });
</script>