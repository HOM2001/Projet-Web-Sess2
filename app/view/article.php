<?php

function html_article_main($article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    $content = $article_a['content'];
    $date = $article_a['date_published'];
    $image_path = MEDIA_DIR . $article_a['image_name'];

    $html = <<< HTML
    <div class="container-fluid mb-3">
        <section class="article">
            <article>
                <h1>$title</h1>
                <h2>$hook</h2>
                <div class="media_article"><img src="$image_path" alt="$title"></div>
                <div>$date</div>
                <div>$content</div>
            </article>
        </section>
       </div>
HTML;

    return $html;
}

function html_all_articles_main($article_a)
{
    ob_start();
    ?>
    <div class="container-fluid mb-3">
        <section class="other">
            <?php
            foreach ($article_a as $art_a) {
                $title = $art_a['title'];
                $art_id = $art_a['id'];
                $hook = $art_a['hook'];

                echo <<< HTML
                    <article>
                        <a href="?page=article&art_id=$art_id"><h1>$title</h1></a>
                        <h2> $hook</h2>
                    </article>
HTML;
            }
            ?>
        </section>
    </div>
    <?php

    return ob_get_clean();

}