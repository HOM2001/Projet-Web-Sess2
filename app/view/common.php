<?php
/*
 * Display a static menu with the link => head
 * display our group name and our indivudials names
 */
function html_head($menu_a = [], $user_id = "", $user_role = "",$banner="")
{
    $debug = false;
    ob_start();
    ?>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>LAST NEWS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/internal/main.css">

    </head>
    <body>
    <header>
        <h1>
            LAST NEWS

        </h1>
      <?php

           if ($banner && isset($banner['banner_4IPDW'])){

    echo <<<HTML
<div style="background-image: url('{$banner['banner_4IPDW']['background_image']}'); color: {$banner['banner_4IPDW']['color']};">
    <a href="{$banner['banner_4IPDW']['link']}">
        <img src="{$banner['banner_4IPDW']['image']}" alt="Burotix">
    </a>
    <p>{$banner['banner_4IPDW']['text']}</p>
</div>
HTML;

}

        foreach ($menu_a as $menu) {
            $text = $menu[0];
            $link = $menu[1];
            $option = isset($menu[2])?"&name=".$menu[2]:"";

            echo <<< HTML
                <a href="?page=$link$option">$text</a> |
              
HTML;
        }
                   echo <<< HTML
                
            <select id="date" name="date">
                <option value="2023-12-01">1 Décembre 2023</option>
                <option value="2023-12-07">7 Décembre 2023</option>
                <option value="2023-12-14">14 Décembre 2023</option>
                <option value="2023-12-21">21 Décembre 2023</option>
                <option value="2023-12-28">28 Décembre 2023</option>
            </select>
        
              
HTML;


?>

        Welcome, <?= $user_id ?> (<?= $user_role ?>).

    </header>
    <main>
    <?php

    if ($debug) {
        echo "<pre>";
//      var_dump($_COOKIE);
        //     var_dump($_SESSION);
        // var_dump($_GET);
        //      var_dump($_POST);
//       var_dump(check_login("Owaiss"));
//       var_dump($user_role, $user_id);
//        var_dump(check_login($user_id));
        // var_dump(display_sponsor());

        echo "</pre>";
    }
    return ob_get_clean();
}

function html_foot()
{
    ob_start();
    ?>
    </main>
    <footer>
        <hr/>
        Groupe G : Hamid Owaiss , Imane Amane

    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
