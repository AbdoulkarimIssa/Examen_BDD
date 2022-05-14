<?php
require_once "model/FilmManager.php";
ini_set("display_errors", "On");

function listfilms($offset)
{
    $filmManager = new FilmManager();
    $films = $filmManager->getfilms($offset);
    //$lignes = $films->rowCount();//nombre de ligne
    $lignes = $filmManager->getlines();
    $pagination_index = round($lignes/30);
    require "view/frontend/listeFilmsView.php";
}
function FilmByid($id)
{
    $filmManager = new FIlmManager();
    $film = $filmManager->getFilmById($id);
    require "view/frontend/detailFilm.php";
}

// lors de l'implementation du filtre, n'oublie pas d'ajouter un identifiant dans la focntion filtre
// pour savoir queltype de filtre il veut mettre en place.
function filtreByTitle($title)
{
    $filmManager = new FilmManager();
    $films = $filmManager->getfilmByfiltreName($title);
    $lignes = $films->rowCount();//nombre de ligne
    $pagination_index = round($lignes/30);
    require "view/frontend/listeFilmsView.php";
}

function filtreByCategory($categorie)
{
    $filmManager = new FilmManager();
    $films = $filmManager->getfilmByfiltreCategorie($categorie);
    $lignes = $films->rowCount();//nombre de ligne
    $pagination_index = round($lignes/30);
    require "view/frontend/listeFilmsView.php";
}

function filtreByActors($acteur)
{
    $filmManager = new FilmManager();
    $films = $filmManager->getfilmByfiltreActor($acteur);
    $lignes = $films->rowCount();//nombre de ligne
    $pagination_index = round($lignes/30);
    require "view/frontend/listeFilmsView.php";
}



