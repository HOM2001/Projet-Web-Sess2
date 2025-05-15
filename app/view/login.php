<?php
/*
 * display the login , log out , a link to home
 * close and open the form
 */



function html_logout_button()
{
    ob_start();
    ?>
    <a href="?page=login&action=logout">log out</a>

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
        Connectez-vous :
        <br>Identifiant
        <input type="text" name="identifier" required> 
        <br>Mot de passe
        <input type="text" name="password" required>
        <br>
        <button type="submit">log in</button>
HTML;

}
function html_unidentified_user_API()
{
    return <<< HTML
        Connectez-vous :
        <br>Votre role 
        <input type="text" name="identifier" required> 
        <br>Mot de passe
        <input type="text" name="password" required>
        <br>
        <button name type="submit">log in</button>
HTML;

}


function html_link_home()
{
    ob_start();
    ?>
    <p>
        <a href=".">Aller à la page principale</a>
    </p>
    <?php
    return ob_get_clean();
}

function html_open_form()
{
    ob_start();
    ?>
    <form method="post">
    <?php
    return ob_get_clean();
}


function html_close_form()
{
    ob_start();
    ?>
    </form>
    <?php
    return ob_get_clean();
}