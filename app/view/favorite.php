<?php
function html_main_favorite() {
    $articles = get_articles();
    ob_start();
    ?>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                function afficher_panier(cart_data) {
                    $("#panier_contenu").html(""); // Correction du sélecteur
                    let html = "";
                    $.each(cart_data, function (i, value) {
                        html += "<li>" + value + "</li>"; // Correction de la fermeture <li>
                    });
                    $("#panier_contenu").html(html);
                }

                var file = './controller/favorite.php';

                $("button.add").on("click", function () {
                    var params = {
                        article_id: $(this).attr("for"), // Correction de la virgule
                        action: "add"
                    };
                    $.post(file, params, afficher_panier, "json");
                });

                $("button.del").on("click", function () {
                    var params = {
                        article_id: $(this).attr("for"),
                        action: "delete"
                    };
                    $.post(file, params, afficher_panier, "json");
                });

                $("button.delete_cart").on("click", function () {
                    $.post(file, { action: "delete_cart" }, afficher_panier, "json");
                });

                $.post(file, afficher_panier, "json"); // Charge le panier au démarrage
            });
        </script>

    <section class="favorite">

            <H1> Catalogue </H1>
            <br>
            <?php
            if (!empty($articles) && is_array($articles)) {
                foreach ($articles as $article) {
                    $title = $article['title'];
                    $art_id = $article['id'] + 1;
                    echo <<<HTML
                        <div id = "article{$art_id}">
                        Article {$art_id} : {$title}
                        </div>
                        <button class ="add" for="article_id">
                        Ajouter au panier
                        </button>         
                         <button class ="del" for="article_id">
                        Ajouter au panier
                        </button>   
                        <hr>                  
HTML;
                }
            }

            ?>
        <div id="panier">
            Dans votre panier :
            <ul id="panier_contenu"></ul>
        </div>
        <button class="delete_cart">Effacer tout le panier</button>
    </section>
    <?php
    return ob_get_clean();
}
