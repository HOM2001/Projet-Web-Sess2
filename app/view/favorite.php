<?php
/*
 * Display a cart for add favorite article in the cart
 */
function html_main_favorite() {
    $articles = get_articles();
    ob_start();
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {

            function afficher_panier(cart_data) {
                $("#panier_contenu").html("");
                let html = "";
                $.each(cart_data, function (i, v) {
                    html += "<li>" + v + "</li>";
                });
                $("#panier_contenu").html(html);

                // Mise à jour de l'affichage des boutons
                $("button.delete").hide();
                $.each(cart_data, function (i, v) {
                    $("button.delete[data-id='"+v+"']").show();
                });

                $("button.add").show();
                $.each(cart_data, function (i, v) {
                    $("button.add[data-id='"+v+"']").hide();
                });
            }

            var server_url = '../index.php';

            $("button.add").on("click", function () {

                var param = { article_id: $(this).data("id"), action: "add" };
                $.post(server_url, param, afficher_panier, "json");
            });

            $("button.delete").on("click", function () {

                var param = { article_id: $(this).data("id"), action: "del" };
                $.post(server_url, param, afficher_panier, "json");
            });

            $("button.delete_cart").on("click", function () {

                $.post(server_url, { action: "delete_cart" }, afficher_panier, "json");
            });

            $.post(server_url, { action: "get_cart" }, afficher_panier, "json");
        });

    </script>

    <section class="favorite">
        <h1>Catalogue</h1>
        <br>
        <?php
        if (!empty($articles) && is_array($articles)) {
            foreach ($articles as $article) {
                $title = $article['title'];
                $art_id = $article['id']+1;

                echo <<<HTML
                    <div id="article{$art_id}">
                        Article {$art_id} : {$title}
                    </div>
                    <button class="add" data-id="{$art_id}">Ajouter au panier</button>
                    <button class="delete" data-id="{$art_id}" style="display: none;">Retirer du panier</button>
                    <hr>
HTML;
            }
        }
        ?>
        <div id="panier">
            <h2>Dans votre panier :</h2>
            <ul id="panier_contenu"></ul>
        </div>
        <button class="delete_cart">Effacer tout le panier</button>
    </section>
    <?php
    return ob_get_clean();

}