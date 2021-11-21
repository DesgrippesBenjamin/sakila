<?php

require_once("model/ConnexionManager.php");

class MoviesManager extends DataBassConnexion {

    // querry querry get all movies

    public function getMovies(){ 

            $conn = $this->connectDatabase();
            $req = $conn->query('SELECT film_id, title, description FROM film');

            return $req;
    }

    // querry find one movie

   public function findOneMovie($filmId){
        $conn = $this->connectDatabase();
        $req = $conn->prepare('SELECT * FROM film Where film_id = ?');
        $req->execute(array($filmId));
        $post = $req->fetch();

        return $post;
    }


    
}