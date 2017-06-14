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

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<?php CreateNav(); ?>
</body>
</html>