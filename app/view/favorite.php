<?php
function html_main_favorite() {
    $articles = get_articles(); // Récupérer la liste complète des articles
    ob_start();
    ?>
    <section class="favorite">
        <form method="post">
            <?php
            if (!empty($articles) && is_array($articles)) {
                foreach ($articles as $article) {
                    $title = $article['title'];
                    $art_id = $article['id'];

                    echo <<<HTML
                        <input type="checkbox" id="$art_id" name="choix[]" value="$art_id">
                        <label for="$art_id">$title</label><br>
HTML;
                }
            } else {
                echo "<p>Aucun article disponible.</p>";
            }
            ?>
            <button type="submit">Ajouter aux favoris</button>
        </form>
    </section>
    <?php
    return ob_get_clean();
}
