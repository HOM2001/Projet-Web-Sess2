<?php
/*
 * a function that return if the user is logged or log out
 */
function main_login()
{
    $action = $_GET['action'] ?? "";
    $msg = '';

    if ($action === 'logout') {
        session_unset();
        $msg = 'Vous êtes déloggué. ';
    }
    // Vérification le mode d'authentification
    if (AUTH_METHOD == "CSV") {
        $login = $_POST['identifier'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($login && $password) {
            list($valide, $_SESSION['id'], $_SESSION['role']) = check_login($login, $password);
            if ($valide) {
                $msg = "Vous êtes connecté, bienvenue";
                setcookie("name", $_SESSION['id'], time() + 60 * 60 * 24);
            } else {
                setcookie('id', 0, 0, "/");
                $msg = "Identifiant ou mot de passe incorrect, veuillez réessayer.";
            }
        }
    } elseif (AUTH_METHOD == "API") {
        $user_exists = isset($_POST['identify']) ? check_login($_POST['role'], '') : false;

        if ($user_exists) {
            $_SESSION['user'] = $_POST['role'];
            setcookie("name", $_SESSION['id'], time() + 60 * 60 * 24);
            $msg = 'Vous êtes connecté';
        } else {
            setcookie('id', 0, 0, "/");
            $msg = 'Inconnu, réessayer ou inscrivez-vous.';
        }

        if (isset($_SESSION['user'])) {
            $msg .= 'Vous êtes connecté en tant que ' . $_SESSION['user'];
        }
    }

// Bouton de déconnection
    $msg .= isset($_SESSION['id']) ? html_logout_button() : html_unidentified_user();

// Retour de la page
    return join("\n", [
        ctrl_head(),
        html_open_form(),
        $msg,
        html_link_home(),
        html_close_form(),
        html_foot()
    ]);
}