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
        <div class="container-fluid">
            <div class="col-sm-12" style="background-color: #44A0FF">
                <p class="text-white"><h2><center> Sector Page </center></h2></p>
            </div>

            <div class="row row-centered">
                <div class="col-xs-3 col-centered" style="height: 13%"></div>
            </div>

            <div class="row row-centered">

                <div class="col-xs-4 col-centered" >
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div onclick="redirect(1)" class="panel-body" style="height: 20%; padding: 8% 0;  "><center><h2>Applicatie Ontwikkelaar</h2></center></div>

                    </div>
                </div>
                <div class="col-xs-4 col-centered">
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div onclick="redirect(2) "class="panel-body" style="height: 20%; padding: 8% 0;  "><center><h2>ICT Helpdesk</h2></center></div>

                    </div>
                </div>
                <div class="col-xs-4 col-centered">
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div onclick="redirect(3)" class="panel-body" style="height: 20%; padding: 8% 0;  "><center><h2>Netwerk Beheer</h2></center></div>

                    </div>
                </div>
            </div>

            <div class="row row-centered">

                <div class="col-xs-4 col-centered">
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div class="panel-body" style="height: 20%;  padding: 7% 0;  "><center><h2>Docent Overzicht</h2></center></div>

                    </div>
                </div>
                <div class="col-xs-4 col-centered">
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div class="panel-body" style="height: 20%; padding: 7% 0;  "><center><h2>Loopbaan Begeleiding</h2></center></div>

                    </div>
                </div>
                <div class="col-xs-4 col-centered">
                    <div class="panel panel-default" style="background-color: #8da9fc">
                        <div class="panel-body" style="height: 20%; padding: 7% 0;  "><center><h2>Rooster</h2></center></div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
function redirect(id) {
    window.location.href = "2_Sectorhome.php?SectorID="+id;
}
</script>