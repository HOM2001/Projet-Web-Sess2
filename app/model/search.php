<?php
/*
 * Get all the article with the search options in the database
 */
function get_article_by_search($kw = '', $limit = LIMIT_ARTICLES, $date_min = '', $date_max = '', $readtime = '') {
$sql = <<<SQL
    SELECT
    ident_art AS id,
    title_art AS title,
    hook_art AS hook,
    content_art AS content,
    fk_category_art AS category,
    readtime_art AS readtime
    FROM t_article
    WHERE title_art LIKE :kw_string
    AND (:date_min = '' OR date_art >= :date_min)
    AND (:date_max = '' OR date_art <= :date_max)
    AND (:readtime = '' OR readtime_art = :readtime)
    ORDER BY ident_art DESC
    LIMIT :limit
    SQL;

    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $kw_string = "%$kw%";
    $stmt->bindValue(':kw_string', $kw_string, PDO::PARAM_STR);
    $stmt->bindValue(':date_min', $date_min ?: '1900-01-01', PDO::PARAM_STR);
    $stmt->bindValue(':date_max', $date_max ?: date('Y-m-d'), PDO::PARAM_STR);
    $stmt->bindValue(':readtime', $readtime, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
