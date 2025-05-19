<?php
/*
 * Get all the article in the database
 */

function get_article($article_id)
{
    $sql = <<< SQL
    SELECT
            ident_art AS id,
            title_art AS title,
             hook_art AS hook,
            content_art AS content,
            `fk_category_art` AS category,
            date_art AS date_published, 
            image_art AS image_name
        FROM t_article
        WHERE 
            ident_art = :ident_art ;
SQL;


    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $params = ['ident_art' => $article_id];
    $stmt->execute($params);

    return $stmt->fetch();
}

function get_top_article()
{
    return get_article(1);
}

function get_bottom_article()
{
    foreach ([2,3,4,5] as $art_a) {
        $art_aa [] = get_article($art_a);


    }


    return $art_aa;
}

function get_all_article($limit = LIMIT_ARTICLES)
{
    $sql = <<< SQL
        SELECT
            ident_art AS id,
            title_art AS title,
            hook_art AS hook,
            content_art AS content,
            `fk_category_art` AS category    
        FROM t_article
        ORDER BY ident_art DESC
        LIMIT :limit
SQL;
    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


function get_articles($limit = 10)
{ // Définit une limite par défaut
    $sql = "SELECT ident_art AS id, title_art AS title FROM t_article LIMIT :limit";

    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT); // Sécurisation du paramètre
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
