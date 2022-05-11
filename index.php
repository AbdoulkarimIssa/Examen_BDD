<?php
ini_set('display_errors', 'On');
require("controller/frontendController.php");

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listFilms') {
        listfilms();
    }

    if ($_GET['action'] == 'FilmById') {
        FilmByid($_GET['id']);
    }
}
else {
    listfilms();
    //filtreByTitle('BOUND');
}