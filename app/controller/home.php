<?php
/*
 * a function that return the head , body and foot of the page
 */
function main_home()

{
    if(isset($_POST['set_color'])){
      $bg_color = $_POST['bg_color'];

}else{
    $bg_color = DEFAULT_BGCOLOR;

}
    var_dump($bg_color);

    $article = get_top_article();
    $bottom_article = get_bottom_article();


    return join("\n", [
        ctrl_head(),
        form_background($bg_color),
        html_home_main($article, $bottom_article),
        html_foot(),

    ]);
    //  return html_head() . html_body() . html_foot();

}