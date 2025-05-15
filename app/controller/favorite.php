<?php

function main_favorite()
{
    favorite();
    $favorites = get_favorites();
    $article = @$_GET['id'];

    return join("\n", [
        ctrl_head(),
        html_favorite($favorites, $article),
        html_foot(),
    ]);
}