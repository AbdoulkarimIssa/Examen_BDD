<?php
require_once "model/FilmManager.php";
ini_set("display_errors", "On");

//Cette fonction retourne la liste des films en tenant compte de l'offset
function listfilms($offset)
{
    $filmManager = new FilmManager();
    $films = $filmManager->getfilms($offset);
    //$lignes = $films->rowCount();//nombre de ligne
    $lignes = $filmManager->getlines();
    $pagination_index = round($lignes/30);
    require "view/frontend/listeFilmsView.php";// page d'affichage des films
}
//Cette fonction retourne un film specifique demandé par l'utilisateur
function FilmByid($id)
{
    $filmManager = new FIlmManager();
    $film = $filmManager->getFilmById($id);
    require "view/frontend/detailFilm.php";//detail d'un film
}

// fonction d'affichage des films en tenant comptes des filtres
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



