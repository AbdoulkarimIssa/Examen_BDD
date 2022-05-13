<?php
ini_set("display_errors", "On");
require "controller/frontendController.php";

if (isset($_GET["action"])) {
    if ($_GET["action"] == "listFilms") {
        listfilms();
    }

    if ($_GET["action"] == "FilmById") {
        FilmByid($_GET["id"]);
    }
}
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
    listfilms();
    //filtreByTitle('BOUND');
}
