<?php
function main_login()
{
    $action = $_GET['action'] ?? "";
    $msg = '';

    if ($action === 'logout') {
        session_unset();
        $msg = 'Vous êtes déloggué.';
    }

    $login = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($login && $password) {
        list($valide, $_SESSION['id'], $_SESSION['role']) = check_login($login, $password);
        if ($valide) {
            $msg = "Vous êtes connecté, bienvenue " . $_SESSION['id'] . ", vous êtes l'". $_SESSION['role'] . " du site! ";
            setcookie("name", $_SESSION['id'], time() + 60 * 60 * 24);
        } else {
            setcookie('id', 0, 0, "/");
            $msg = "Identifiant ou mot de passe incorrect, veuillez réessayer.";
        }
    }
    $msg .= isset($_SESSION['id']) ? html_logout_button() : html_unidentified_user();
    return join("\n", [
        ctrl_head(),
        html_open_form(),
        $msg,
        html_link_home(),
        html_close_form(),
        html_foot()
    ]);
}
?>
