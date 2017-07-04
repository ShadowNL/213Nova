<?php
session_start();
include 'DatabaseConnection.php';
if(isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
}
if(isset($_GET['VakID'])){
    $VakID = $_GET['VakID'];
}


function GetUsername(){
    if ($_SESSION['username']==null){
        header ("Location: 3_adminlogin.php?err=1");
    }else {
        echo $_SESSION['username'];
    }
}

function GetVakken(){
    global $conStr;
    global $SectorID;
    $sqlNav = "SELECT * FROM vakken";

    $result = $conStr->query($sqlNav);



    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo'<center><div onclick="redirect('.$row["SectorID"].','.$row["VakID"]. ')" class="MenuItem">' .
                $row["Vaknaam"] ."</div>";

        }
    } else {
        echo "Geen vakken in deze sector gevonden";
    }
}

function OpenAddSubject(){
    if(isset($_GET['VakID'])){
        $VakID = $_GET['VakID'];

    if($_GET['SectorID'] == -1||$_GET['VakID'] == -1) {
        echo "<center><div class=\"\" style=\"margin: 20px; width: auto; height: auto\">
                    <h2>Vak Toevoegen</h2>
                    </br>
                    <form method='post' action='AddSubject.php'>
                    <table style=\"border-color: transparent\">
                        <tr>
                            <td>Select sector:</td>
                            <td><select name='sector' id='sector' style='width: 200px; height: 25px;'>
                                        <option value=\"\">Select...</option>
                                        <option value=\"1\">Applicatieontwikkeling</option>
                                        <option value=\"2\">Netwerk beheer</option>
                                        <option value=\"3\">Service desk</option>
                                    </select></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Vak naam:</td>
                            <td><input type=\"text\" name=\"vak\" style='width: 200px; height: 25px;' ></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type=\"submit\" style=\"float: left;\">Add</button></td>
                        </tr>
                    </table>
                    </form>
                </div>";
    }
}
}

function GetSelectedSubject(){
    global $conStr;
    global $SectorID;
    global $VakID;
    $sqlNav = "SELECT * FROM opdrachten WHERE VakID =" .$VakID;

    $result = $conStr->query($sqlNav);

    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<center>
<table>
    <tr>
        <td>
            <div class='opdrachten-label-admin'>
                <b>".$row["Titel"] . "</b>
            </div>  
        </td>
        <td>
            <button type=\"button\" value='".$row['OpdrachtID']."' class=\"button-admin\" id=\"myBtn\" name='Edit'>Edit</button>
        </td>
        <td>
            <div class='button-delete-admin'>
                delete
            </div>
        </td>
    </tr>
</table>
                            
                 </center>";
        }
    } else {
        if($VakID != -1)
        echo "Geen opdrachten in dit vak gevonden";
    }
}

function editmodal()
{
    global $conStr;
    $VakID = $_GET['VakID'];
    $OpdrachtID = $_GET['Edit'];


    $sqlEdit = "SELECT * FROM opdrachten WHERE VakID = $VakID AND OpdrachtID = $OpdrachtID ";
    $result = $conStr->query($sqlEdit);

    $row = $result->fetch_assoc();
    echo '
    <!-- Modal -->
            <div  style="height: 100%"class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="height: 8% ;padding:2px ;background-color: #ffae63;">
                            <h3 class="modal-title">   
                                <center> <p style="color: white">Bestand aanpasen</p></center>
                            </h3>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">

                                <form role="form">
                                    <div class=\"form-group\" style="resize: none">
                                    <input class=\"form-control\" id=\"title\" placeholder="'.$row["Titel"].'">
                                    <div class=\"form-group\">
                                        <textarea class=\"form-control\" style=\"min-width: 100%;overflow-y: scroll ;min-height: 20%; resize: none\" placeholder="'.$row["Omschrijving"].'"></textarea>
                                    </div>

                                    <div class=\"form-group\" style=\"max-height: 3%\">
                                    <textarea class=\"form-control\" style=\"max-height: 4.7%; resize: none\" readonly=\"\" placeholder="'.$row["Downloadlink"].'"></textarea>
                            </div>
                            </div>

                        </div><div class="modal-footer" style="height: 7% ;padding: 2 2 ;background-color: #ffae63">
                            <div class="col-sm-4">  <center><button style="background-color:transparent !important"type="button" class="btn btn-primary-outline"><h4><p style="color: white">Verwerp</p></h4></button> </center></div>
                            <div class="col-sm-4">  </div>
                            <div class="col-sm-4"> <center><button style="width:100% ;background-color:transparent !important"type="button" class="btn btn-primary-outline"><h4><p style="color: white">Toevoegen</p></h4</button></center> </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    ';

}

?>

<html>
    <head>
        <title>landingpage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!--fontawsome link-->
        <link rel="stylesheet" href="font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="offcanvas.css"/>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>

        <div id="mySidenav" class="sidenav">
                <img class="Logo" src="images/Adminlogo.png" width="100%"; height="100px";>
                <div class="menusplit"></div>
            <?php GetVakken(); ?>
            <div onclick="redirect(-1,-1)" class="MenuItem"><span class="glyphicon glyphicon-plus-sign"></span></div>
        </div>

        <div id="main">
            <div class="col-sm-12" style="background-color: #ffae63">
                <span style="font-size:30px;cursor:pointer;color: white"  onclick="toggleNav()">&#9776;</span>
                <span class="pull-right Loggedinas" style="padding: 0 0"> Welcome <?php GetUsername(); ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                       <button onclick="logout()" style="margin: 0em; background-color:transparent !important "type="submit" class="btn btn-primary-outline">
                           <i class="fa fa-power-off fa-2x" aria-hidden="true"></i>
                       </button>
                </span>

            </div>
            <div class="col-sm-12" style="height: 28%"></div>
            <div class="col-sm-12 Opdrachten-view" style="max-height: 65%">
                <?php
                OpenAddSubject();

                if (isset($_GET['VakID'])) {
                    GetSelectedSubject();
                }
                ?>
            </div>
        </div>
        <?php editmodal(); ?>
    </body>
</html>

<script>
    // 0 = dicht, 1 = open
    var navOpen = false;

    function toggleNav() {
        if (navOpen) {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        } else {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
        navOpen = !navOpen;
    }

    function redirect(id, id2) {
        window.location.href = "4_adminoverview.php?SectorID="+id+"&VakID="+id2;
    }
    
    function logout(){
        window.location.href = "Logout.php"
    }
</script>
<script>
    $(document).ready(function () {
        $("#myBtn").click(function () {
            $("#myModal").modal();
        });
    });

</script>
<script>
    $(function () {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
        });

    });
</script>