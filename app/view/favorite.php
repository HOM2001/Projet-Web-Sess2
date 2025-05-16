<?php

function html_main_favorite($article_a)
{
ob_start();
?>
<section class="favorite">
    <form method="post">
    <?php
    foreach ($article_a as $art_a) {
        $title = $art_a['title'];
        $art_id = $art_a['id'];

        echo <<< HTML
              
                <input type="checkbox" id=$art_id name="choix" value="option1">
                <label for="option1">$title</label><br>
</form>
</section>
HTML;
    }
}


