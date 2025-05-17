<?php

/*
 * return a array of the item in the file
 */
function get_menu_csv()
{
    $fn = '../asset/database/menu.csv';
    $menu_csv = file_get_contents($fn);
    $menu_a = explode("\n", $menu_csv);
    $menu_tab = [];
    foreach ($menu_a as $menu_item) {
        $menu_tab[] = explode("|", $menu_item);
    }
    return $menu_tab;
}

function get_pdo()
{
    static $pdo;
    if (empty($pdo)) {
        $pdo = new PDO('mysql:host=localhost;dbname=press_2024_03', 'root', '');
        $pdo->query("SET NAMES utf8");
    }
    return $pdo;
}


function banner(){
    $json_url = "http://playground.burotix.be/adv/banner_for_isfce.json";

    try {
        $json_data = file_get_contents($json_url);
        if($json_data == null){
            throw new Exception("Erreur : le fichier JSON est vide");
        }
        $banner = json_decode($json_data, true);
        if($banner == null || !isset($banner['banner_4IPDW'])){
            throw new Exception("Erreur : JSON invalide");
        }
        return $banner;
    }catch(Exception $e){
        echo "Erreur : " . $e->getMessage();
     return null;
    }

}


