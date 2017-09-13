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
    <button id="Submit" type="Submit" value="Update">Update</button>
</form>
<script>
    $("#Submit").click(function(e) {
        e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: 'edit_update.php',
                    data: {
                        Titel: $('#updateform').children('[name="newTitel"]').val(),
                        Downloadlink: $('#updateform').children('[name="NewDownloadlink"]').val(),
                        Omschrijving: $('#updateform').children('[name="NewOmschrijving"]').val()
                        ? >);},
            success:function(response){
                location.reload();
            }
        });
    });
</script>