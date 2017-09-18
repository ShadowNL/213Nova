<!-- Modal -->
<div id="adminEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-admin-login">

        <!-- Modal content-->
        <div class="panel-heading-custom header-admin-login">
            <div class="headertext-admin-login">
                Opdracht wijzigen
            </div>
        </div>
        <div id="modalcontent">
        </div>
    </div>
</div>

<div id="adminLoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-admin-login">
        <!-- Modal content-->
        <!--div class="panel panel-default" -->
        <div class="panel-heading-custom header-admin-login">
            <div class="headertext-admin-login">
                Inloggen als Docent
            </div>
        </div>
        <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
        <div class="panel-body body-admin-login">
            <div class="form-admin-login">
                <form id="loginForm" action="redirect.php" method="post">
                <input type="text" name="user" placeholder="Gebruikersnaam" class="input-admin-login"><br><br>
                <input type="password" name="pass" placeholder="Wachtwoord" class="input-admin-login"><br><br>
                <!--GETERROR MOET HIER-->
                <!--FORM WORD NIET GESLOTEN-->
            </div>
        </div>
        <div class="panel-footer footer-admin-login">
            <button id="loginSubmit" class="pull-right button-admin-login" type="submit">Login</button>
            <button type="button" class="pull_left button-admin-login" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>