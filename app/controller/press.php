<?php

function main_press()
{

    $all_article = get_all_article();

    return join("\n", [
        ctrl_head(),
        html_all_articles_main($all_article),
        html_foot(),
    ]);
}