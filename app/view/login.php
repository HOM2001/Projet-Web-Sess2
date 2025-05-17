<?php
/*
 * display the login , log out , a link to home
 * close and open the form
 */



function html_logout_button()
{
    ob_start();
    ?>
    <div class="container-fluid mb-3">
        <a href="?page=login&action=logout">log out</a>
    </div>
    <?php
    return ob_get_clean();
}

function html_unidentified_user()
{
   if(AUTH_METHOD == "CSV") {
       return html_unidentified_user_CSV();
   }else if(AUTH_METHOD == "API") {
       return html_unidentified_user_API();
   }

}
function html_unidentified_user_CSV()
{
    return <<< HTML
<br>
    <div class="container-fluid mb-3">
        Connectez-vous :
        <br>Identifiant
        <input type="text" name="identifier" required> 
        <br>Mot de passe
        <input type="text" name="password" required>
        <br>
        <button type="submit">log in</button>
    </div>
HTML;

}
function html_unidentified_user_API()
{
    return <<< HTML
<!--     <div class="container-fluid mb-3">
        Connectez-vous :
        <br>Votre role 
        <input type="text" name="identifier" required> 
        <br>Mot de passe
        <input type="text" name="password" required>
        <br>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div> -->
    <div class="mb-3">
        <h3>Connectez-vous</h3>
        <label for="identifier" class="form-label">Votre Role</label>
        <input type="text" class="form-control" name="identifier" placeholder="Role">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
HTML;
}


function html_link_home()
{
    ob_start();
    ?>
    <div class="container-fluid mb-3">
        <p>
            <a href=".">Aller à la page principale</a>
        </p>
    </div>
    <?php
    return ob_get_clean();
}

function html_open_form()
{
    ob_start();
    ?>
    <form method="post">
        <div class="container-fluid mb-3">
    <?php
    return ob_get_clean();
}


function html_close_form()
{
    ob_start();
    ?>
        </div>
    </form>
    <?php
    return ob_get_clean();
}