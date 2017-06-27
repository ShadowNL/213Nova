<?php
session_start();

    if(isset($_POST['hidden'])){
        include('DatabaseConnection.php');

        $username = $_POST['Username'];
        $password = $_POST['Password'];
    }


function Geterror()
{
    $error_id = isset($_GET['err']);
    if ($error_id == 1){
        echo"Wrong username or password";
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
        <div class="row row-centered">
            <div class="col-xs-12" style="height: 25%">
            </div>

            <div class="col-xs-3">

            </div>
            <div class="col-xs-6">
                <div class="panel panel-default" style="height: 43% ; border: none !important">
                    <div class="panel-heading-custom" style="background-color: #ffae63 ; height: 15%"><h2><center>Inloggen als Docent</center></h2></div>
                    <div class="panel-body" style="height: 65%  ; background-color: #ffedbf ">
                        <div >
                            <form action="redirect.php" method="post">

                                <center>Username:<input type="text" name="user" ></center>

                                <p> &nbsp;</p>
                                <center>Password:<input type="password" name="pass"  ></center>
                                <p>&nbsp;</p>
                                &nbsp;
                                <center><label style="color: red"><?php Geterror(); ?></label></center>
                        </div>
                    </div>
                                <div class="panel-footer" style="background-color: #ffae63">
                                    <div class="pull-left" id="SectorPage">
                                        <button class="btn" >Terug naar Sectoren</button>
                                    </div>

                                    <div class="pull-right" id="Login">
                                        <button class="btn"  type="submit">Login</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>


            </div>
            <div class="col-xs-3">

            </div>


    </body>
</html>
<script>

</script>