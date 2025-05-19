<?php
header('Location: ./public/index.php');
$banner_url = "http://playground.burotix.be/adv/banner_for_isfce.json";
$banner_json = @file_get_contents($banner_url);

$banner = null;
if ($banner_json !== false) {
    $banner = json_decode($banner_json, true);
}
?>