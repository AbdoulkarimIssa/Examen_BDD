<?php
ini_set("display_errors", "On");
require "controller/frontendController.php";

// Gestion des routes vers les pages démandé par l'utilisateur
if (isset($_GET["action"])) {
    if ($_GET["action"] == "listFilms") {
        if(isset($_GET["index"])){
            $index = (int)$_GET["index"];
            listfilms($index*30);
        }else
        listfilms(0);
    }

    if ($_GET["action"] == "FilmById") {
        FilmByid($_GET["id"]);
    }

}
//Pour les filtres
elseif (isset($_POST['search']) && $_POST['search'] > 2) {
    if ($_POST['filtre']=='title') {
        filtreByTitle($_POST['search']);
    }

    if ($_POST['filtre']=='category') {
        filtreByCategory($_POST['search']);
    }

    if ($_POST['filtre']=='actors') {
        filtreByActors($_POST['search']);
    }
}
else {
    // si aucun des routes demande par l'utilisateur ne figure parmis ceux qui sont cité, on retourne à la page d'aceuil
    listfilms(0);
}
