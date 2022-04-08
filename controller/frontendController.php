<?php
require_once("model/FilmManager.php");

function listfilms(){
    $filmManger = new FilmManager();
    $films = $filmManger->getfilms();
    return $films;

    require('view/frontend/listeFilmsView.php');
}


