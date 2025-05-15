<?php
/*
 * check if the username in the file is true and false
 */


function check_login($login, $password)
{
    if (AUTH_METHOD == "CSV") {
        return login_CSV($login, $password);
    }
    if (AUTH_METHOD == "API") {
        return login_API($login, $password);
    }
}
function login_CSV($inputname, $inputpw)
{
    try {
        $f = fopen("../asset/database/login.csv", "r");
        while (!feof($f)) {
            $line = fgets($f);
            $user_info = explode(";", trim($line));
            if ($user_info[0] == $inputname && $user_info[1] == $inputpw) {


                fclose($f);
                return array(true, $user_info[0], $user_info[2]);
            }

        }
        fclose($f);
        return array(false, null, null);

    } catch (Exception $e) {
        echo "Problem while reading file login.csv : " . $e->getMessage();
        return array(false, null, null);
    }
}
function login_API($inputname, $inputpw)
{

    $login_api = "http://playground.burotix.be/login/?";
    $api_param = [
        "login"   => $inputname,
        "passwd"  => $inputpw,
    ];
    $link = $login_api . http_build_query($api_param);
    $json_string = file_get_contents($link);
    $auth_a = json_decode($json_string, true);

    if( ! $auth_a['identified'])
    {
        // user not identified
        return false;
    }

    // user identified
    echo "<div>Vous êtes {$auth_a['name']} avec le rôle : {$auth_a['role']}</div>";
    return true;
}