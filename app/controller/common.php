<?php


/*
 * get the user information
 */
function ctrl_head()
{

    // get user info
    if(AUTH_METHOD === "CSV"){
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
    }elseif(AUTH_METHOD === "API"){
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
    }

    if (isset($_POST['set_color'])) {
        $_SESSION['bg_color'] = $_POST['bg_color'];
    }else{
        $_SESSION['bg_color'] = DEFAULT_BGCOLOR;
    }
    $bg_color = $_SESSION['bg_color'];

    if(isset($_POST['set_font'])){
        $_SESSION['text_font'] = $_POST['text_font'];
    }else{
        $_SESSION['text_font'] = DEFAULT_FONT;
    }

    $font = $_SESSION['text_font'];

    if(isset($_POST['set_size'])){
        $_SESSION['text_size'] = $_POST['text_size'];
    }else{
        $_SESSION['text_size'] = DEFAULT_FONT_SIZE;
    }
    $font_size = $_SESSION['text_size'];
   // get menu array from csv
    $menu_csv = get_menu_csv();

    return join("\n", [

        html_head($menu_csv, $user_id, $user_role),
        form_start(),
        form_background($bg_color),
        form_font($font),
        form_font_size($font_size),
        form_end()
    ]);



}