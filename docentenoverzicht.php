<?php
session_start();
include 'DatabaseConnection.php';

function GetUsername()
{
    if (isset($_SESSION['username'])) {
        echo '<div class="nav navbar-nav pull-right"><li><a id="btn-logout" href="#">Hallo ' . $_SESSION['username'] . '</a></li></div>';
    } else {
        echo '<div class="nav navbar-nav pull-right" type="button" data-toggle="modal" data-target="#adminLoginModal"><li><a href="#">Admin login</a></li></div>';
    }
}

function sqlResultToArray($sqlResult){
        $rows = [];
        while($row = mysqli_fetch_array($sqlResult)) {
            $rows[] = $row;
        }
        return $rows;
}

function getName($docentId){
    global $conStr;
    $sql = "SELECT Firstname,Prefix,Lastname FROM docenten WHERE DocentID = " . $docentId;
    $result = $conStr->query($sql);
    $name = "";
    //if results still contain rows
    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            //get full name
            $name = $row["Firstname"] . " " . $row["Prefix"] . " " . $row["Lastname"];
        }
    }
    return $name;
}

function getVakken($docentId){
    global $conStr;
    $sql = "SELECT vakken.Vaknaam "
            . "FROM vakken "
            . "INNER JOIN docentenoverzicht ON vakken.VakID = docentenoverzicht.VakID "
            . "WHERE docentenoverzicht.DocentID = " . $docentId;
    $result = $conStr->query($sql);
    $stringVak = "";
    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $stringVak = $stringVak . $row["Vaknaam"] . ", ";
        }
    }
    return $stringVak;
}

function generateDocenten(){
    global $conStr;
    $sql = "SELECT DocentID FROM docenten";
    $result = $conStr->query($sql);
    if ($result && $result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            //fetch values
            $id = $row["DocentID"];
            $name = getName($id);
            $vakken = getVakken($id);
            //generate html
            echo "<div class='row' style='padding-bottom:15px;'>
                    <div class='col-sm-2'></div>
                    <div class='col-sm-8 docent-label' style='padding:0;margin:0;'>
                        <div class='docent-label-header'></div>
                        <div class='col-sm-2 docent-label-foto'></div>
                        <div class='col-sm-3 docent-label-naam'>" . $name . "</div>
                        <div class='col-sm-7 docent-label-vakken'>" . $vakken . "</div>
                    </div>
                    <div class='col-sm-2'></div>
                  </div>";
        }
    }
}
?>

<html>
<head>
    <title>Docentenoverzicht</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" id="common-styles" href="css/Common.css"/>
    <link rel="stylesheet" type="text/css" id="student-styles" href="css/Student.css"/>
    <link rel="stylesheet" type="text/css" id="admin-styles" href="css/Admin.css" disabled="true"/>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-custom-213 navbar-fixed-top">
    <div class="navbar-custom-213-brand">Docenten Overzicht</div>
    <div class='nav navbar-nav pull-left'><li><a href='1_Landingpage.php'>Naar Sectoroverzicht</a></li></div>
    <?php GetUsername(); ?>
</nav>
<div style="height:50px;"></div>

<!--Content-->
<div class="container-fluid" style="">
    <!--Header-->
    <div class="row docent-legend">
        <div class='col-sm-2'></div>
            <div class='col-sm-8' style='padding:0;'>
                <div class='col-sm-2' style="padding:0">Foto</div>
                <div class='col-sm-3'>Naam</div>
                <div class='col-sm-7'>Vakken</div>
            </div>
        <div class='col-sm-2'></div>
    </div>
    <!--Docentlabels-->
    <?php
    generateDocenten();
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js "></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/General.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<?php include 'AdminLoginModal.html'; ?>

</body>
</html>
<script>
    //START of CSS file switcher
    <?php 
    //initialise loggedIn variable and give it a value
    if (isset($_SESSION['username'])){
        echo 'var loggedIn = true;';
    } else {
        echo 'var loggedIn = false;';
    }
    ?>
    function switchStyle(){
        //disable admin css when not logged in. logged in? dont disable admin css.
        loggedIn = document.getElementById('admin-styles').disabled = !loggedIn;
    }
    if (loggedIn) {
        //if logged in, enable the admin css. Essentially updating the css.
        switchStyle();
    }
    //END of CSS file switcher
    
    function toPage(id){
        switch(id){
            case "sectoroverzicht":
                window.location.href = "1_Landingpage.php"; break;
            case "docentenoverzicht": 
                window.location.href = "docentenoverzicht.php"; break;
            case "rooster":
                window.location.href = "https://roosters.xedule.nl/OrganisatorischeEenheid/Attendees/102?Code=Laurens%20Baecklaan&OrgId=20";
                break;
            default: break;
        }
    }
</script>