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
    VakID: <input type="text" id="VakID" name="VakID" value="<?php echo $row['VakID'];?>"> <br>
    OpdrachtID: <input type="text" id="OpdrachtID" name="OpdrachtID" value="<?php echo $row['OpdrachtID'];?>"> <br>
    Titel: <input type="text" id="newTitel" name="newTitel" value="<?php echo $row['Titel'];?>"> <br>
    Downloadlink: <input type="text" id="newDownloadlink" name="newDownloadlink" value="<?php echo $row['Downloadlink'];?>"> <br>
    Omschrijving: <input type="text" id="newOmschrijving" name="newOmschrijving" value="<?php echo $row['Omschrijving'];?>"> <br>
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
        console.log($('#VakID').val(),
             $('#OpdrachtID').val(),
             $('#newTitel').val(),
             $('#newDownloadlink').val(),
             $('#newOmschrijving').val(),)
            $.ajax({
                    type: 'POST',
                    url: 'edit_update.php',
                    data: {
                        VakID: $('#VakID').val(),
                        OpdrachtID: $('#OpdrachtID').val(),
                        Titel: $('#newTitel').val(),
                        Downloadlink: $('#newDownloadlink').val(),
                        Omschrijving: $('#newOmschrijving').val()},
                        success:function(response){
                // alert($('#updateform').children('[name="VakID"]').val());
                location.reload();

            }
        })
    });
</script>