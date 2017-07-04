
<?php
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
            $vakken = getVakken($id);//margin:0;
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
    <link rel="stylesheet" type="text/css" href="offcanvas.css"/>

</head>
<body>
    <div id="main">
        <nav class="navbar navbar-custom-blue navbar-fixed-top">
            <div class="nav navbar-nav">
                <li class='pull-left'><a href="1_Landingpage.php">Naar Sectoroverzicht</a></li>
            </div>
            <div class="navbar-custom-blue-brand">Docenten Overzicht</div>
        </nav>
        <div style="height:50px;"></div>
        
        <div class="container-fluid" style="">
            <div class='row' style="font-size:30px;color:#A0A0A0;">
                <div class='col-sm-2'></div>
                    <div class='col-sm-8' style='padding:0;'>
                        <div class='col-sm-2' style="padding:0">Foto</div>
                        <div class='col-sm-3'>Naam</div>
                        <div class='col-sm-7'>Vakken</div>
                    </div>
                <div class='col-sm-2'></div>
            </div>
            <?php
            generateDocenten();
            ?>
        </div>
    </div>
</body>
</html>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>