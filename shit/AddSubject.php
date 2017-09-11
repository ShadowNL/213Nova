<?php
?>
<html>
<head>
</head>
<body>
<center>
    <div class="" style="margin: 0px; width: auto; height: auto;">
        <h2 style='margin:0;'>Vak Toevoegen</h2>
        </br>
        <form method='post' action='../AddSubjectSQL.php'>
            <table style="border-color: transparent">
                <tr>
                    <td>Select sector:</td>
                    <td><select name='sector' id='sector' style='width: 200px; height: 25px;'>
                        <option value="">Select...</option>
                        <option value="1">Applicatieontwikkeling</option>
                        <option value="2">Netwerk beheer</option>
                        <option value="3">Service desk</option>
                    </select></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Vak naam:</td>
                    <td><input type="text" name="vak" style='width: 200px; height: 25px;'></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <button type="submit" style="float: left;">Add</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</center>
</body>
</html>