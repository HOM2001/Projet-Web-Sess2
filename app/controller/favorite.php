<?php

function main_favorite()
{
if(isset($_SESSION['cart'])){
     $_SESSION['cart'] = array();
}
if(isset($_POST['action']) and $_POST['action'] ="delete_cart"){
$_SESSION['cart'] = array();
}
if(isset($_POST['action'])
    and $_POST['action'] ="add"
    and ! empty($_POST['article_id'])){
    $_SESSION['cart'] = $_POST['article_id'];
    sort($_SESSION['cart']);
}
$cart_json = json_encode($_SESSION['cart']);
echo$cart_json;

    $article = @$_GET['id'];

    return join("\n", [
        ctrl_head(),
        html_main_favorite($article),
        html_foot(),
    ]);
}