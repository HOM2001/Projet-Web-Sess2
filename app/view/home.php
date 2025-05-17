<?php


function html_home_main($article_a, $bottom_article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    $art_id = $article_a['id'];


    ob_start();
    ?>
<div class="container-fluid mb-3">
    <section class="breaking">
        <article>

            <a href="?page=article&art_id=<?= $art_id ?>"><h1><?= $title ?></h1></a>
            <h2><?= $hook ?></h2>
        </article>
    </section>
</div>
    <?php
    echo html_all_articles_main($bottom_article_a);

    return ob_get_clean();
}

