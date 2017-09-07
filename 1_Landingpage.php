<?php
session_start();
function GetUsername()
{
    if (isset($_SESSION['username'])) {
        echo '<div class="nav navbar-nav pull-right"><li><a id="btn-logout" href="#">Hallo ' . $_SESSION['username'] . '</a></li></div>';
    } else {
        echo '<div type="button" class="nav navbar-nav pull-right" data-toggle="modal" data-target="#adminLoginModal"><li><a href="#">Admin login</a></li></div>';
    }
}

?>

<html>
<head>
    <title>landingpage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" id="student-styles" href="css/student.css"/>
    <link rel="stylesheet" type="text/css" id="admin-styles" href="css/admin.css" disabled="true"/>

</head>
<body>
<nav class="navbar navbar-custom-213 navbar-fixed-top">
    <div class="navbar-custom-213-brand">ICT Academie 213Server</div>
    <div class='nav navbar-nav pull-right'>
        <?php GetUsername(); ?>
    </div>
</nav>
<div style="height:50px;"></div>

<div class="container-fluid" style='min-width:600px;max-width:1200px;width:70%;'>
    <div class="row row-centered">
        <div class="col-xs-3 col-centered" style="height: 12%;"></div>
    </div>
    <div class="row row-centered">
        <div class="col-xs-4">
            <div onclick="redirect(1)" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_AO.png" alt="Applicatie-Ontwikkelaar">
                <div class="landing-button-name">Applicatie Ontwikkelaar</div>
            </div>
        </div>
        <div class="col-xs-4">
            <div onclick="redirect(2)" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_ICTB.png" alt="ICT Beheer">
                <div class="landing-button-name">ICT Beheer</div>
            </div>
        </div>
        <div class="col-xs-4">
            <div onclick="redirect(3)" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_NETB.png" alt="Netwerk Beheer">
                <div class="landing-button-name">Netwerk Beheer</div>
            </div>
        </div>
    </div>
    <div class="row row-centered">
        <div class="col-xs-4">
            <div onclick="toPage('docentenoverzicht')" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_Teach.png" alt="Docenten Overzicht">
                <div class="landing-button-name">Docenten Overzicht</div>
            </div>
        </div>
        <div class="col-xs-4">
            <div onclick="" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_Teach.png" alt="Loopbaan Begeleiding">
                <div class="landing-button-name">Loopbaan Begeleiding</div>
            </div>
        </div>
        <div class="col-xs-4">
            <div onclick="toPage('rooster')" class="panel panel-default landing-button-panel">
                <img class="landing-img" src="images/Landingimg_Rooster.png" alt="Xedule Roosterpagina">
                <div class="landing-button-name">Rooster</div>
            </div>
        </div>
    </div>
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
    
    function redirect(id) {
        window.location.href = "2_Sectorhome.php?SectorID=" + id + "&VakID=0#nav-open";
    }
    function toPage(id) {
        switch (id) {
            case "sectoroverzicht":
                window.location.href = "1_Landingpage.php";
                break;
            case "docentenoverzicht":
                window.location.href = "docentenoverzicht.php";
                break;
            case "rooster":
                window.location.href = "https://roosters.xedule.nl/OrganisatorischeEenheid/Attendees/102?Code=Laurens%20Baecklaan&OrgId=20";
                break;
            default:
                break;
        }
    }
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="jquery.fittext.js"></script>
<script>
    jQuery("#res").fitText();
</script>

