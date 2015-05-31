<?php
    session_start();

    $path = "pages/erreur.php";

    if ( isset($_GET['page']) and !empty($_GET['page']) )
    {
        $page = htmlspecialchars($_GET['page']);

        if ( file_exists("core/$page.php") )
        {
            $path = "core/$page.php";
        }
        else
        {
            $errMsg = "page introuvable";
        }
    }
    else
    {
        $page="accueil"; //page par default, l'accueil
    }

    include("static/haut.php");
    include("static/navbar.php");

    include($path);

    include("static/bas.php");
?>
