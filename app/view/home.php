<?php

function html_home_main($article_a, $bottom_article_a)
{
    $title = $article_a['title'];
    $hook = $article_a['hook'];
    $art_id = $article_a['id'];

    ob_start();
    ?>

    <br>
        <div class="container">
            <div class="card">
                <section class="breaking">
                    <article>
                        <a href="?page=article&art_id=<?= $art_id ?>"><h1><?= $title ?></h1></a>
                        <h2><?= $hook ?></h2>
                    </article>
                </section>
            </div>
        </div>
    <br>

    <!-- Liste des articles -->
    <div class="container">
        <ul class="list-group">

            <?php foreach ($bottom_article_a as $article): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="?page=article&art_id=<?= $article['id'] ?>">
                        <?= htmlspecialchars($article['title']) ?>
                    </a>
                    <span class="badge bg-primary rounded-pill">
                        <?= strlen($article['content']) ?> caractères
                    </span>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

    <?php
    return ob_get_clean();
}
