<?php
require_once '../app/models/MovieModel.php';
require_once '../app/models/CategoriesModel.php';
require_once '../app/models/LinkYTBModel.php';

class MoviesDetailController {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function detail()
    {
        
        $movieId = $_GET['id'] ?? null; // Lấy ID từ URL
        if (!$movieId) {
            echo 'Phim không tồn tại';
            return;
        }

        $movieModel = new MovieModel($this->db);
        $categoriesModel = new CategoriesModel($this->db);
        $linkYTBModel = new LinkYTBModel($this->db);
        $movie = $movieModel->getMovieById($movieId);
        $categories = $categoriesModel->getCategoriesByMovieId($movieId);
        $videos = $linkYTBModel->getVideosByMovieId($movieId);
        if (!$movie) {
            echo 'Phim không tồn tại';
            return;
        }

        include '../app/views/movie_detail.php';
    }
}
?>