<?php
require_once("model/FilmManager.php");
ini_set('display_errors', 'On');

function listfilms(){
    $filmManager = new FilmManager();
    $films = $filmManager->getfilms();
    require('view/frontend/listeFilmsView.php');
}


