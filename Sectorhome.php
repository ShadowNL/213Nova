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
//zie jij dit beer? mhuahahaha
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

function CreateNav(){
    global $conStr;
    global $SectorID;
    $sqlNav = "SELECT * FROM vakken WHERE SectorID =" . $SectorID ;

    $result = $conStr->query($sqlNav);

    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>' . "<td>" .
                '<div class="col-md-12">' .
                $row["Vaknaam"] ."". "</div>" . '</td>' . '</tr>';
        }
    } else {
        echo "Geen vakken in deze sector gevonden";
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
<div class="bs-example bs-navmenu-offcanvas-example">
    <div id="myNavmenuCanvas" class="canvas-slid" style="left: 300px; right: -300px;">
        <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas in" role="navigation">
            <a class="navmenu-brand" href="#">Brand</a>
            <ul class="nav navmenu-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
        </nav>
        <div class="navbar navbar-default navbar-fixed-top">
            <button type="button" class="" data-toggle="collapse" data-target="#myNavmenu" data-canvas="#myNavmenuCanvas" data-placement="left">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis in aliquet nisl. Praesent sed leo congue, fringilla eros eu, tempus metus. Nam mollis odio ipsum, non vehicula ipsum accumsan sodales. Morbi varius vitae elit euismod cursus. Donec a dapibus justo, in facilisis nisi. Suspendisse ut turpis dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dui risus, tincidunt at odio ut, ultrices dignissim ipsum. Cras ultrices erat nec leo luctus varius. Nulla sollicitudin tincidunt nulla, ut porta mauris volutpat vitae. Suspendisse ornare dolor sit amet massa venenatis pulvinar.</p>
    </div>
</div>

</body>
</html>
<!-- alle java scripts HIER aub dankuwel ;)-->
<script src="offcanvas.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $('.sidebar-toggle').collapse();
</script>
