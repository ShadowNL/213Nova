<!-- Modal -->
<div id="addVakModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-admin-login">

<!-- Modal content-->
        <div class="panel-heading-custom header-admin-login">
            <div class="headertext-admin-login">
                Vak toevoegen
            </div>
        </div>
        <div class="panel-body body-admin-login">
            <div class="form-admin-login">
                <form id="toevoegenvakForm">
                <input type="text" id="newtitel" name="newtitel" placeholder="titel" class="input-admin-login"><br><br>
            </div>
        </div>
        <div class="panel-footer footer-admin-login">
            <button type="button" class="pull-close button-admin-login" data-dismiss="modal">Annuleren</button>
            <button id="vakSubmit" class="pull-right button-admin-login" type="submit">Toevoegen</button>
        </div>
    </div>
</div>
<script>
    $("#vakSubmit").click(function(e) {
        e.preventDefault();
        console.log($('#newtitel').val());
        $.ajax({
            type:'POST',
            url:'AddSubjectSQL.php',
            data: { newvaknaam: $('#newtitel').val(),
                sector: <?php echo $_GET['SectorID']; ?>},
            success:function(response){
                location.reload();
            }
        });
    });
</script>