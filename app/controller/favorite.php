<?php

function main_favorite()
{

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; //
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] == "delete_cart") {
            $_SESSION['cart'] = [];
        }
        if ($_POST['action'] == "add" && !empty($_POST['article_id'])) {
            $_SESSION['cart'][] = $_POST['article_id']; // Ajoute l'article au tableau
            $_SESSION['cart'] = array_unique($_SESSION['cart']); // Évite les doublons
        }
        if ($_POST['action'] == "del" && !empty($_POST['article_id'])) {
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($id) {
                return $id != $_POST['article_id'];
            });
        }
    }

    echo json_encode($_SESSION['cart']); // Retourne le panier au format JSON$cart_json = json_encode($_SESSION['cart']);

    $article = @$_GET['id'];

    return join("\n", [
        ctrl_head(),
        html_main_favorite($article),
        html_foot(),
    ]);
}