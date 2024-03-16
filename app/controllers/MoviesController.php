<?php
require_once '../app/models/MovieModel.php';
require_once '../app/models/CategoriesModel.php';

class MoviesController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
        
    }
    
    public function index() {
        $movieModel = new MovieModel($this->db);
        $allMovies = $movieModel->getAllMovies();
        include '../app/views/movies.php';
    }

    public function search($keyword){
        $movieModel = new MovieModel($this->db);
        $searchMovies = $movieModel->search_movies($keyword);
        include '../app/views/moviessearch.php';
    }
}

?>