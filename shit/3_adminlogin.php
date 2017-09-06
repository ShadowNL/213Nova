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
        <link rel="stylesheet" type="text/css" href="../offcanvas.css"/>
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
                <div class="panel panel-default" style="min-height:150px; height:43%; min-width:400px; border:none !important; padding:0;">
                    <!--Heading-->
                    <div class="panel-heading-custom" style="background-color:#ffae63; min-height:25px; height:15%;">
                        <div style="color:white; text-align:center; font-weight: bold; font-size:calc(15px + 1em); font-size:calc(15px + 1vw);">
                            Inloggen als Docent
                        </div>
                    </div>
                    <!--Login-->
                    <div class="panel-body" style="height: 65%; background-color: #ffedbf ">
                        <div style="min-width:100px; width:50%; position:absolute; top:50%; left:50%; transform:translateX(-50%) translateY(-50%);">
                            <form action="../redirect.php" method="post">
                                <input type="text" name="user" placeholder="Gebruikersnaam" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                                <input type="password" name="pass" placeholder="Wachtwoord" style="min-width:150px;width:100%;font-size:1.5em;font-size:1.5vw"><br><br>
                                <label style="color:red;"><?php Geterror(); ?></label>
                                <br>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="panel-footer" style="background-color: #ffae63; padding:0; height:13%;">
                        <!--Submit button for login-->
                        <button class="pull-right button-admin-login" type="submit">Login</button>
                        </form>
                        <!--Back to landingpage-->
                        <a href="../1_Landingpage.php" style="color: black">
                            <button class="pull_left button-admin-login" type="submit">Terug naar Sectoren</button>
                        </a>
                        
                        <div class="clearfix"></div>

                    </div>


            </div>
            <div class="col-xs-3">

            </div>
        </div>

    </body>
</html>
<script>

</script>