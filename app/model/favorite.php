<?php

function favorite()
{
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

}

function add_favorite($article_id, $article_title)
{
    $_SESSION['favorites'][$article_id] = $article_title;
}

function get_Favorites()
{
    return $_SESSION['favorites'];
}

function remove_Favorite($articleId)
{
    unset($_SESSION['favorites'][$articleId]);

}

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'addFavorite' && isset($_GET['id'], $_GET['title'])) {
        add_favorite($_GET['id'], $_GET['title']); //
        header('Location: index.php?action=showFavorites');
        exit();
    } elseif ($_GET['action'] === 'removeFavorite' && isset($_GET['id'])) {
        remove_favorite($_GET['id']); //
        header('Location: index.php?action=showFavorites');
        exit();
    }
}


if (isset($_GET['action']) && $_GET['action'] === 'showFavorites') {
    echo main_favorite();
}
function get_articles($limit = 10) { // Définit une limite par défaut
    $sql = "SELECT ident_art AS id, title_art AS title FROM t_article LIMIT :limit";

    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT); // Sécurisation du paramètre
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

