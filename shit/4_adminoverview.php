<<<<<<< HEAD:4_adminoverview.php
<?php
session_start();
include 'DatabaseConnection.php';
if (isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
}
if (isset($_GET['VakID'])) {
    $VakID = $_GET['VakID'];
}

function GetUsername() {
    if ($_SESSION['username'] == null) {
        header("Location: 3_adminlogin.php?err=1");
    } else {
        echo $_SESSION['username'];
    }
}

function GetVakken() {
    global $conStr;
    global $SectorID;
    $sqlNav = "SELECT * FROM vakken";

    $result = $conStr->query($sqlNav);



    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo'<center><div sector=' . $row["SectorID"] . ' vak=' . $row["VakID"] . ' class="MenuItem">' .
            $row["Vaknaam"] . "</div></center>";
        }
    } else {
        echo "Geen vakken in deze sector gevonden";
    }
}

function GetSelectedSubject() {
    global $conStr;
    global $SectorID;
    global $VakID;
    $sqlNav = "SELECT * FROM opdrachten WHERE VakID =" . $VakID;

    $result = $conStr->query($sqlNav);

    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<center>
<table>
    <tr>
        <td>
            <div class='opdrachten-label-admin'>
                <b>" . $row["Titel"] . "</b>
            </div>  
        </td>
        <td>
            <button type=\"button\" class=\"btn btn-info btn-lg\" id=\"myBtn\" value='".$row['OpdrachtID']."' name='Edit,' style=\"background-color: transparent!important\">Open Modal</button>
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
        if ($VakID != -1){
            echo "Geen opdrachten in dit vak gevonden";
        }
    }
}

?>

<html>
    <head>
        <title>landingpage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
    <scrip src="http://code.jquery.com/jquery-1.7.1.min.js"></scrip>
    <script src="js/General.js"></script>    
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="offcanvas.css"/>
    </head>
    <body>

        <div id="mySidenav" class="sidenav">
            <img class="Logo" src="images/Adminlogo.png" width="100%" height="100px">
            <div class="menusplit"></div>
            <?php GetVakken(); ?>
            <center><div id="addsubject" class="MenuItem"><a style="color: white; font-size: 100%;" href="AddSubject">Add</a></div></center>
        </div>
        
        <div id="main">
            <!--navbar-->
            <nav class="navbar navbar-custom-blue nav-orange student-nav-side-fix">
                <div  class='nav navbar-nav pull-left'><li id='navspacer'><p></p></li></div>
                <div class='nav navbar-nav pull-left'>
                    <li><a style='font-size:30px;cursor:pointer;color: white' onclick="toggleNav()">&#9776;</a></li>
                </div>
                <div class='nav navbar-nav pull-left'><li><a href='1_Landingpage.php'>Naar Sectoroverzicht</a></li></div>
                
                <span class="pull-right Loggedinas" style="padding: 0 0"> Welcome <?php //GetUsername(); ?></span>
                <div class='nav navbar-nav pull-right'><li>
                    <button onclick="logout()" style="margin: 0em; background-color:transparent !important "type="submit" class="btn btn-primary-outline">
                    <i class="fa fa-power-off fa-2x" aria-hidden="true"></i>
                </button></li></div>
            </nav>
            <!--
            <div class="col-sm-12" style="background-color: #FF9900">
                <span style="font-size:30px;cursor:pointer;color: white"  onclick="toggleNav()">&#9776;</span>
                <span class="pull-right Loggedinas" style="padding: 0 0"> Welcome <?php //GetUsername(); ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    
                </span>

            </div>
            -->
            <!--
            <div class="col-sm-12" style="height: 28%">
            </div>
           -->
            <div id="content"></div>
        </div>
        <!-- de div hier beneden mag niet in de main!!!!!!!!!!-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
        window.location.href = "4_adminoverview.php?SectorID=" + id + "&VakID=" + id2;
    }

    function logout() {
        window.location.href = "Logout.php"
    }
</script>
<script>
    // new gesprek
    $("#newGesprek").click(function () {
        var VakID = 1;
        var OpdrachtID = 3;
        var Title = 'test';
        $("#EditModalTitle").html("opdracht aanpassen - " + Title );
        $('#EditModal').modal('show');
    });

    $("#saveGesprek").click(function () {
        var OV = $("#Sel").val();
        var gesprek = $("#formPostDescription").val();
        postData = {
            'Select_Student': OV,
            'formPostDescription': gesprek,
        }

        // ajax request to post the new 'gesprek'
        $.ajax({
            type: "POST",
            data: postData,
            url: "NewGesprek.php",
            success: function (data) {
                $('#EditModal').modal('hide');
            }
        });
    })
</script>
=======
<?php
session_start();
include 'DatabaseConnection.php';
if (isset($_GET['SectorID'])) {
    $SectorID = $_GET['SectorID'];
}
if (isset($_GET['VakID'])) {
    $VakID = $_GET['VakID'];
}

function GetUsername() {
    if ($_SESSION['username'] == null) {
        header("Location: 3_adminlogin.php?err=1");
    } else {
        echo $_SESSION['username'];
    }
}




function GetVakken() {
    global $conStr;
    global $SectorID;
    $sqlNav = "SELECT * FROM vakken";

    $result = $conStr->query($sqlNav);



    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo'<center><div sector=' . $row["SectorID"] . ' vak=' . $row["VakID"] . ' class="MenuItem">' .
            $row["Vaknaam"] . "</div></center>";
        }
    } else {
        echo "Geen vakken in deze sector gevonden";
    }
}

function GetSelectedSubject() {
    global $conStr;
    global $SectorID;
    global $VakID;
    $sqlNav = "SELECT * FROM opdrachten WHERE VakID =" . $VakID;

    $result = $conStr->query($sqlNav);

    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<center>
<table>
    <tr>
        <td>
            <div class='opdrachten-label-admin'>
                <b>" . $row["Titel"] . "</b>
            </div>  
        </td>
        <td>
            <button type=\"button\" class=\"btn btn-info btn-lg\" id=\"myBtn\" value='".$row['OpdrachtID']."' name='Edit,' style=\"background-color: transparent!important\">Open Modal</button>
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
        if ($VakID != -1){
            echo "Geen opdrachten in dit vak gevonden";
        }
    }
}

?>

<html>
    <head>
        <title>landingpage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
    <scrip src="http://code.jquery.com/jquery-1.7.1.min.js"></scrip>
    <script src="../js/General.js"></script>    
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="../font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="../offcanvas.css"/>
    </head>
    <body>

        <div id="mySidenav" class="sidenav">
            <img class="Logo" src="../images/Adminlogo.png" width="100%" height="100px">
            <div class="menusplit"></div>

            <?php GetVakken(); ?>

            <center><div id="addsubject" class="MenuItem"><a style="color: white; font-size: 100%;" href="AddSubject">Add</a></div></center>
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
            <!--
            <div class="col-sm-12" style="height: 28%">
            </div>
           -->
            <div id="content"></div>
        </div>
        <!-- de div hier beneden mag niet in de main!!!!!!!!!!-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
        window.location.href = "4_adminoverview.php?SectorID=" + id + "&VakID=" + id2;
    }

    function logout() {
        window.location.href = "../Logout.php"
    }
</script>
<script>
    // new gesprek
    $("#newGesprek").click(function () {
        var VakID = 1;
        var OpdrachtID = 3;
        var Title = 'test';
        $("#EditModalTitle").html("opdracht aanpassen - " + Title );
        $('#EditModal').modal('show');
    });

    $("#saveGesprek").click(function () {
        var OV = $("#Sel").val();
        var gesprek = $("#formPostDescription").val();
        postData = {
            'Select_Student': OV,
            'formPostDescription': gesprek,
        }

        // ajax request to post the new 'gesprek'
        $.ajax({
            type: "POST",
            data: postData,
            url: "NewGesprek.php",
            success: function (data) {
                $('#EditModal').modal('hide');
            }
        });
    })
</script>
>>>>>>> SPA:shit/4_adminoverview.php
