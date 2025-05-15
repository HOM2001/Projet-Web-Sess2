<?php
function html_search_form($kw = '', $limite = LIMIT_ARTICLES,$date_min='',$date_max='')
{
    return <<<HTML
         <form method="post">
            <label>Introduisez votre mot-clé</label>
            <input name="kw" type="text" value="$kw">
            <br>
            <label>Nombre de résultats</label>
            <input name="limit" type="text" value="$limite">
            <br>
            <label for="date_min">Date minimale :</label>
            <input type="date" id="date_min" name="date_min" value="$date_min">
            <br>
            <label for="date_max">Date maximale :</label>
            <input type="date" id="date_max" name="date_max" value="$date_max">
            <br>
            <button name="search">rechercher</button>
         </form>
HTML;

}