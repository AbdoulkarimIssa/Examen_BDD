<?php
ini_set("display_errors", "On");

require_once "model/Manager.php";

class FilmManager extends Manager
{
    public function getfilms()
    {
        $db = $this->db_connection();
        $sql = "SELECT f.FID, f.title, f.description, f.category, f.price, 
                        f.length, f.rating, f.actors, f_t.release_year,l.name 
                FROM `film_list` f 
                LEFT JOIN film f_t ON f.FID = f_t.film_id 
                LEFT JOIN language l on l.language_id = f_t.language_id LIMIT 30";
        $result = $db->query($sql);
        return $result;
    }

    public function getFilmByid($id)
    {
        $db = $this->db_connection();
        // $sql = "SELECT film_id, title, description, length, rental_rate, rating FROM film WHERE film_id='$id'";
        $sql = "SELECT f.FID, f.title, f.description, f.category, f.price, 
                        f.length, f.rating, f.actors, f_t.release_year,l.name 
                FROM `film_list` f 
                LEFT JOIN film f_t ON f.FID = f_t.film_id 
                LEFT JOIN language l on l.language_id = f_t.language_id 
                WHERE f.FID='$id'";
        $result = $db->query($sql);
        return $result;
    }
    public function getfilmByfiltreName($title)
    {
        $db = $this->db_connection();
        //$sql = "SELECT film_id, title, description, length, rental_rate, rating FROM film WHERE title like '%$title%' LIMIT 30";
        $sql = "SELECT f.FID, f.title, f.description, f.category, f.price, 
                f.length, f.rating, f.actors, f_t.release_year,l.name 
                FROM `film_list` f 
                LEFT JOIN film f_t ON f.FID = f_t.film_id 
                LEFT JOIN language l on l.language_id = f_t.language_id 
                WHERE f.title like '%$title%' LIMIT 30";
        $result = $db->query($sql);
        return $result;
    }

    public function getfilmByfiltreActor($acteur)
    {
        $db = $this->db_connection();
        $sql = "SELECT f.FID, f.title, f.description, f.category, f.price, 
                f.length, f.rating, f.actors, f_t.release_year,l.name 
                FROM `film_list` f 
                LEFT JOIN film f_t ON f.FID = f_t.film_id 
                LEFT JOIN language l on l.language_id = f_t.language_id 
                WHERE f.actors like '%$acteur%' LIMIT 30";
        $result = $db->query($sql);
        return $result;
    }

    public function getfilmByfiltreCategorie($categorie)
    {
        $db = $this->db_connection();
        //$sql = "SELECT film_id, title, description, length, rental_rate, rating FROM film WHERE title like '%$title%' LIMIT 30";
        $sql = "SELECT f.FID, f.title, f.description, f.category, f.price, 
                f.length, f.rating, f.actors, f_t.release_year,l.name 
                FROM `film_list` f 
                LEFT JOIN film f_t ON f.FID = f_t.film_id 
                LEFT JOIN language l on l.language_id = f_t.language_id 
                WHERE f.category like '%$categorie%' LIMIT 30";
        $result = $db->query($sql);
        return $result;
    }
}
