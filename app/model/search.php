<?php

function get_article_by_search($kw = '', $limit = LIMIT_ARTICLES, $date_min = '', $date_max ='') {
    $sql = <<<SQL
        SELECT
            ident_art AS id,
            title_art AS title,
            hook_art AS hook,
            content_art AS content,
            fk_category_art AS category    
        FROM t_article
        WHERE title_art LIKE :kw_string
        AND (:date_min = '' OR date_art >= :date_min)
        AND (:date_max = '' OR date_art <= :date_max)
        ORDER BY ident_art DESC
        LIMIT :limit
SQL;

    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $kw_string = "%$kw%";
    $stmt->bindValue(':kw_string', $kw_string, PDO::PARAM_STR);
    $stmt->bindValue(':date_min', $date_min ?: '1900-01-01', PDO::PARAM_STR);
    $stmt->bindValue(':date_max', $date_max ?: date('Y-m-d'), PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
