<?php
/*
 * a function that return the head , body and foot of the page
 */
function main_home()

{



    $article = get_top_article();
    $bottom_article = get_bottom_article();


    return join("\n", [
        ctrl_head(),
        html_home_main($article, $bottom_article),
        html_foot(),

    ]);
    //  return html_head() . html_body() . html_foot();

}