<?php

function main_article()
{
    $article = $_GET['art_id'];
    $article_a = get_article($article);

    return join("\n", [
        ctrl_head(),
        html_article_main($article_a),
        html_foot(),
    ]);
}