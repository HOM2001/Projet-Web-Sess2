<?php

function main_search()
{
    $kw = isset($_POST['kw']) ? $_POST['kw'] : '';
    $limit = isset($_POST['limit']) ? $_POST['limit'] : LIMIT_ARTICLES;
    $date_min= isset($_POST['date_min']) ? $_POST['date_min'] : '';
    $date_max= isset($_POST['date_max']) ? $_POST['date_max'] : '';
    $readtime = isset($_POST['reading-time']) ? $_POST['reading-time'] : DEFAULT_READTIME;
    $article_by_search = get_article_by_search($kw, $limit, $date_min, $date_max,$readtime);

    return join("\n", [
        ctrl_head(),
        html_search_form($kw, $limit, $date_min, $date_max,$readtime),
        html_all_articles_main($article_by_search),
        html_foot()
    ]);
}