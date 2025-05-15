<?php

function get_static_content($name)
{
    try
    {
     $fn = "../asset/static_content/$name.html";
     return file_get_contents($fn);

    }catch(Exception $e){
       return "erreur 404 - page non trouvé";
    }
}