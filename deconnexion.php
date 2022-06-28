<?php
if (isset($_SESSION['username'])) {
    setcookie('mail', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    //$_SESSION = array();
    session_unset();
    header('Location:connexion.php');
} else {
    header('Location: deconnexion.php?erreur=1');
    exit();
}
