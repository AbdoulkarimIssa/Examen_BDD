<?php
require_once("model/FilmManager.php");
ini_set('display_errors', 'On');

function listfilms(){
    $filmManager = new FilmManager();
    $films = $filmManager->getfilms();
    require('view/frontend/listeFilmsView.php');
}
function FilmByid($id){
    $filmManager = new FIlmManager();
    $film = $filmManager->getFilmById($id);
    require('view/frontend/detailFilm.php');
}

function filtreByTitle($title){
    $filmManager = new FilmManager();
    $films = $filmManager->getfilmByfiltreName($tilte);
    require('view/frontend/listeFilmsView.php');
}

