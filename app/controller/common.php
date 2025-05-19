<?php


/*
 * get the user information
 */
function ctrl_head()
{

    // get user info
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
    $user_role = isset($_SESSION['role']) ? $_SESSION['role'] : '';



    if (!isset($_SESSION['bg_color'])) {
        $_SESSION['bg_color'] = DEFAULT_BGCOLOR;
    }
    if (!isset($_SESSION['text_font'])) {
        $_SESSION['text_font'] = DEFAULT_FONT;
    }
    if (!isset($_SESSION['text_size'])) {
        $_SESSION['text_size'] = DEFAULT_FONT_SIZE;
    }
    if(!isset($_SESSION['border'])) {
        $_SESSION['border'] = DEFAULT_BORDER;
    }

    if (isset($_POST['set_color'])) {
            $_SESSION['bg_color'] = $_POST['bg_color'];
        }
        if (isset($_POST['set_font'])) {
            $_SESSION['text_font'] = $_POST['text_font'];
        }
        if (isset($_POST['set_size'])) {
            $_SESSION['text_size'] = $_POST['text_size'];
        }
        if (isset($_POST['set_border'])) {
            $_SESSION['border'] = $_POST['border'];
        }
        $border = $_SESSION['border'];
        $bg_color = $_SESSION['bg_color'];
    $font = $_SESSION['text_font'];
    $font_size = $_SESSION['text_size'];
   // get menu array from csv
    $menu_csv = get_menu_csv();

    return join("\n", [

        html_head($menu_csv, $user_id, $user_role,banner()),
        form_start(),
        form_background($bg_color),
        form_font($font),
        form_font_size($font_size),
        form_border($border),
        form_end()
    ]);



}