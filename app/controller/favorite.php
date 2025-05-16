<?php

function main_favorite()
{

    $article = @$_GET['id'];

    return join("\n", [
        ctrl_head(),
        html_main_favorite($article),
        html_foot(),
    ]);
}