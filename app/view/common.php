<?php
/*
 * Display a static menu with the link => head
 * display our group name and our indivudials names
 */
function html_head($menu_a = [], $user_id ="", $user_role = "",$banner="")
{
    $debug = false;
    ob_start();
    ?>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>LAST NEWS</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/internal/main.css">

    </head>
    <body class="d-flex flex-column min-vh-100">
        <?php
        echo style_sheet_bg_color($_SESSION['bg_color']);
        echo style_sheet_font($_SESSION['text_font']);
        echo style_sheet_font_size($_SESSION['text_size']);
        ?>
    <header>
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

echo <<< HTML
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">LAST NEWS</a>

    <!-- Bouton hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu de la navbar -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
HTML;

// Menu dynamique
foreach ($menu_a as $menu) {
    $text = $menu[0];
    $link = $menu[1];
    $option = isset($menu[2]) ? "&name=" . $menu[2] : "";

    echo <<< HTML
        <li class="nav-item">
          <a class="nav-link" href="?page=$link$option">$text</a>
        </li>
HTML;
}

// Dates rédactionnelles
echo <<< HTML
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Date rédactionnelle
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="?date=2023-12-01">1 Décembre 2023</a></li>
            <li><a class="dropdown-item" href="?date=2023-12-07">7 Décembre 2023</a></li>
            <li><a class="dropdown-item" href="?date=2023-12-14">14 Décembre 2023</a></li>
            <li><a class="dropdown-item" href="?date=2023-12-21">21 Décembre 2023</a></li>
            <li><a class="dropdown-item" href="?date=2023-12-28">28 Décembre 2023</a></li>
          </ul>
        </li>
      </ul>

      <!-- Engrenage avec options -->
      <ul class="navbar-nav">
        <li class="nav-item">
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#form_settings" aria-expanded="false" aria-controls="form_settings">
                <i class="bi bi-gear"></i>
            </button>
        </li>
      </ul>
    </div>
  </div>
</nav>
HTML;



?>

<?php
     if ($user_id || $user_role) {
        echo <<< HTML
            Welcome <?=$user_id?> (<?=$user_role?>)
        HTML;
}
?>
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

function form_start(){
    $html = <<< HTML
        <div class="collapse" id="form_settings">
            <br>
    HTML;
    return $html;
}

function form_end(){
    $html = <<< HTML
        </div>
    HTML;
    return $html;
}

function form_background($bg_color)
{
    $html = <<< HTML
    <div class="container-fluid mb-3">
        <form method="POST">
            <label>Sélectionnez la couleur du fond :</label>
            <select id="bg_color" name="bg_color">
                <option value="lightskyblue" " . ($bg_color === 'lightskyblue' ? 'selected' : '') . ">Bleu ciel</option>
                <option value="black" " . ($bg_color === 'black' ? 'selected' : '') . ">Noir</option>
                <option value="grey" " . ($bg_color === 'grey' ? 'selected' : '') . ">Gris</option>
            </select>
            <button name="set_color" type="submit">Changer</button>
        </form>
    </div>
HTML;

    return $html;
}
function form_font($text_font)
{
    $html = <<< HTML
    <div class="container-fluid mb-3">
        <form method="POST">
            <label>Sélectionnez la police du texte :</label>
            <select id="text_font" name="text_font">
                <option value="georgia" " . ($text_font == 'georgia' ? 'selected' : '') . ">Georgia</option>
                <option value="arial" " . ($text_font == 'arial' ? 'selected' : '') . ">Arial</option>
                <option value="times_roman" " . ($text_font == 'times_rome' ? 'selected' : '') . ">Times New Roman</option>
            </select>
            <button name="set_font" type="submit">Changer</button>
        </form>
    </div>
HTML;

    return $html;
}

function form_font_size($font_size)
{
    $html = <<< HTML
    <div class="container-fluid mb-3">
        <form method="POST">
            <label>Sélectionnez la taille du texte :</label>
            <select id="text_size" name="text_size">
                <option value="10px" " . ($font_size === '10px' ? 'selected' : '') . ">10 pixel</option>
                <option value="14px" " . ($font_size === '14px' ? 'selected' : '') . ">14 pixel</option>
                <option value="18px" " . ($font_size === '18px' ? 'selected' : '') . ">18 pixel</option>
            </select>
            <button name="set_size" type="submit">Changer</button>
        </form>
    </div>
HTML;

    return $html;
}

function style_sheet_bg_color($bg_color=DEFAULT_BGCOLOR)
{
    $html = <<< HTML
<style>
body
{
background-color: $bg_color;
}
</style>

HTML;
    return $html;
}
function style_sheet_font($text_font= DEFAULT_FONT){
    $html = <<< HTML
 <style>
 body
 {
 font-family: $text_font;
 }
 </style>
    
HTML;
    ;
    return $html;
}
function style_sheet_font_size($font_size = DEFAULT_FONT_SIZE) {
    $html = <<<HTML
    <style>
        body {
            font-size: {$font_size}px;
        } 
    </style>
HTML;

    return $html;
}

function html_foot()
{
    ob_start();
    ?>
    </main>
    <footer class="mt-auto">
        <div class="container">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            </ul>
        </div>
        <p class="text-center text-muted">Groupe G : Hamid Owaiss , Imane Amane</p>
    </footer>
    <script src="../../public/js/internal/detail.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
