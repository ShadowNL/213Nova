<?php
include "DatabaseConnection.php";

function editmodal()
{
    global $conStr;
    //$VakID = $_GET['VakID'];
    //$OpdrachtID = $_GET['Edit'];
    $VakID = 1;
    $OpdrachtID = 3;

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
        <link rel="stylesheet" href="../font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../offcanvas.css"/>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>

        <div class="container">
            <h2>Activate Modal with JavaScript</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" id="myBtn" name="Edit" style="background-color: transparent!important">Open Modal</button>
            <?php editmodal(); ?>









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

            });</script>
    </body>
</html>