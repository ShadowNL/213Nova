<?php
session_start();
include 'DatabaseConnection.php';

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
?>

<html>
    <head>
        <title>landingpage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="offcanvas.css"/>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>

        <div id="mySidenav" class="sidenav">
                <img class="Logo" src="images/Adminlogo.png" width="100%"; height="100px";>
                <div class="menusplit"></div>
            <?php GetVakken(); ?>
            <div class="MenuItem"><span class="glyphicon glyphicon-plus-sign"></span></div>
        </div>

        <div id="main">
            <div class="col-sm-12" style="background-color: #ffae63">
                <span style="font-size:30px;cursor:pointer;color: white"  onclick="toggleNav()">&#9776;</span>
                <span class="pull-right Loggedinas"> Welcome <?php GetUsername(); ?>
                    </button>
                </span>

            </div>
            <div class="col-sm-12 Opdrachten-view" style="height: 35%"></div>
            <div class="col-sm-12 Opdrachten-view">
                <div class="h1-custom">
                    <center><h1 style="color: #b0b7b6 ">Kies een vak</h1></center>
                </div>
            </div>
        </div>

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
</script>
