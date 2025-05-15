<?php


function html_home_main($article_a, $bottom_article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    $art_id = $article_a['id'];


    ob_start();
    ?>

    <section class="breaking">
        <article>

            <a href="?page=article&art_id=<?= $art_id ?>"><h1><?= $title ?></h1></a>
            <h2><?= $hook ?></h2>
        </article>
    </section>
    <?php
    echo html_all_articles_main($bottom_article_a);

    return ob_get_clean();
}

function form_background($bg_color)
{
    $html = <<< HTML
     <form method="POST">
    <label>Sélectionnez la couleur du fond :</label>
    <select id="bg_color" name="bg_color" value=$bg_color>
        <option value="lightskyblue">Blue ciel </option>
        <option value="black">Noir</option>
        <option value="grey">Gris</option>
    </select>
    <button name="set_color" type="submit">Changer</button>
</form>
HTML;

    return $html;
}


function style_sheet($bg_color=DEFAULT_BGCOLOR)
{
    $html = <<< HTML
<style>
header, footer
{
background-color: $bg_color;
}
</style>

HTML;
    return $html;
}