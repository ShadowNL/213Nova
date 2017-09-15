<!-- Modal -->
<div id="AdminEditVakModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-admin-login">
        <!-- Modal content-->
        <div class="panel-heading-custom header-admin-login">
            <div class="headertext-admin-login">
                Vak weizigen
            </div>
        </div>
        <div class="panel-body body-admin-login">
            <div class="form-admin-login">
                <form id="vakEditForm" method="post" action="EditSubjectSQL.php">
                    <input type="text" name="newvaknaam" placeholder="De naam van het vak" class="input-admin-login"><br><br>
                    <!--GETERROR MOET HIER-->
                    <!--FORM WORD NIET GESLOTEN-->
            </div>
        </div>
        <div class="panel-footer footer-admin-login">
            <button type="button" class="pull-left button-admin-login" data-dismiss="modal">Annuleren</button>
            <button name="EditDeleteVak" id="EditDeleteVak" type="submit" class="pull-right button-admin-login">Verwijderen</button>
            <button name="submitedit" id="editVakSubmit" class="pull-right button-admin-login" type="submit">Opslaan</button>
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
</script>