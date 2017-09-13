<?php
include 'DatabaseConnection.php';

// fetch SQL information
if(isset($_GET['VakID']))
{
    $id= $_GET['OpdrachtID'];
    $vid= $_GET['VakID'];
    $sql = "SELECT * FROM opdrachten WHERE OpdrachtID='$id' AND VakID='$vid'";
    $res=  mysqli_query($conStr, $sql);
    $row= mysqli_fetch_array($res);
}
?>

<!-- Forms -->
<form action="." id="updateform" method="POST">
    VakID: <input type="text" name="newVakID" value="<?php echo $row['VakID'];?>"> <br>
    OpdrachtID: <input type="text" name="newOpdrachtID" value="<?php echo $row['OpdrachtID'];?>"> <br>
    Titel: <input type="text" name="newTitel" value="<?php echo $row['Titel'];?>"> <br>
    Downloadlink: <input type="text" name="newDownloadlink" value="<?php echo $row['Downloadlink'];?>"> <br>
    Omschrijving: <input type="text" name="newOmschrijving" value="<?php echo $row['Omschrijving'];?>"> <br>
    <button id="SubmitEditOpdracht" type="Submit" value="Update">Update</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/General.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script>
    $("#SubmitEditOpdracht").click(function(e) {
        e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: 'edit_update.php',
                    data: {
                        VakID: $('#updateform').children('[name="newVakID"]').val(),
                        OpdrachtID: $('#updateform').children('[name="newOpdrachtID"]').val(),,
                        Titel: $('#updateform').children('[name="newTitel"]').val(),
                        Downloadlink: $('#updateform').children('[name="newDownloadlink"]').val(),
                        Omschrijving: $('#updateform').children('[name="newOmschrijving"]').val()},
                        success:function(response){
                alert($('#updateform').children('[name="newTitel"]').val());
                location.reload();

            }
        });
    });
</script>