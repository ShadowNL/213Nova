<?php
//check if Sector ID is giving with the selection.....yes this is hardcoded hehe
//check if Sector ID is equal to 1 , 2 or 3 if not redirect to starting page
if (!isset($_GET['SectorID']) || !in_array($_GET['SectorID'], [1, 2, 3])){
    echo "<script>window.location.href='/';</script>";
    die();
}

$sHost = 'localhost';
$sUser = 'root';
$sPass = '';
$sDB = '213server';
//create connection
$conStr = mysqli_connect($sHost, $sUser, $sPass, $sDB);

// check connection
if (!($conStr)) {
    die('Failed to connect to MySQL Database Server - #' . mysqli_connect_errno() . ': ' . mysqli_Connect_error());
    if (!mysqli_select_db('slb')) {
        die('Connected to Server, but Failed to Connect to Database - #' . mysqli_connect_errno() . ': ' . mysqli_connect_errno());
    }
} else {

}
$SectorID = $_GET['SectorID'];
$VakID = $_GET['VakID'];

function CreateNav(){
    global $conStr;
    global $SectorID;
    $sqlNav = "SELECT * FROM vakken WHERE SectorID =" . $SectorID ;

    $result = $conStr->query($sqlNav);



    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo'<center><div onclick="redirect('.$SectorID.','.$row["VakID"]. ')" class="MenuItem">' .
                $row["Vaknaam"] ."</div>";
        }
    } else {
        echo "Geen vakken in deze sector gevonden";
    }
}

function generateOpdrachten(){
        global $conStr;
        global $SectorID;
        global $VakID;
        $sqlNav = "SELECT * FROM opdrachten WHERE VakID =" .$VakID;

        $result = $conStr->query($sqlNav);

        if ($result && $result->num_rows > 0) {
            //output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<center>
                        <div class='opdrachten-label'>
                            <div class='opdrachten-label-header'>
                                <b>".$row["Titel"] . "</b>
                            </div>
                            <div class='opdrachten-label-textbox'>"
                            . $row["Omschrijving"] .
                            "</div>
                            <div class='opdrachten-label-teacher'> leraar: "
                            . $row["Verantwoordelijke"] .
                            "<div class='opdrachten-label-download-btn'>
                                    <a href=".$row["Downloadlink"]." download>download</a>
                            </div>
                            </div>
                        </div>
                     </center>";
            }
        } else {
            echo "Geen opdrachten in dit vak gevonden";
        }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="offcanvas.css"/>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <img class="Logo" src="images/AOLogo.png" width="100%"; height="100px";>
    <div class="menusplit"></div>
    <?php CreateNav() ?>

</div>

<div id="main">
    <div class="col-sm-12" style="background-color: #44A0FF">
    <span style="font-size:30px;cursor:pointer;color: white" onclick="toggleNav()">&#9776;</span>
    </div>
    <div class="col-sm-12 Opdrachten-view">
        <?php
        if (isset($_GET['VakID'])) {
            generateOpdrachten();
        }
        ?>
    </div>
</div>

</body>
</html>
<!-- alle java scripts HIER aub dankuwel ;)-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        window.location.href = "Sectorhome.php?SectorID="+id+"&VakID="+id2;
    }
</script>









