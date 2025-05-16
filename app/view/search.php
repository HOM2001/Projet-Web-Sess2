<?php
function html_search_form($kw = '', $limite = LIMIT_ARTICLES, $date_min = '', $date_max = '', $readtime = '')
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
        <label for="reading-time">Temps de lecture </label>
        <input type="range" id="reading-time" name="reading-time" min="1" max="60" value="$readtime" class="slider">
        <span id="slider-value"> $readtime minutes </span>
        <br>
        <button name="search">Rechercher</button>
    </form>

    <script src="../../public/js/internal/detail.js"></script>
      
HTML;
}
?>
