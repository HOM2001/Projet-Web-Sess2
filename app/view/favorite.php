<?php

function html_favorite($favorites, $articles)
{


    ob_start();
    if (empty($favorites)) {
        echo '<p>Aucun article ajouté aux favoris pour le moment.</p>';
    } else {
        foreach ($articles as $id => $title) {
            echo '<div>';
            echo '<strong>' . $title . '</strong>';
            echo ' <a href="index.php?action=addFavorite&id=' . $id . '&title=' . urlencode($title) . '">Ajouter aux favoris</a>';
            echo '</div>';
        }
    }
    echo '</ul>';

    return ob_get_clean();

}