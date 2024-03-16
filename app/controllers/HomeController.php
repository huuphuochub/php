<?php
require_once '../app/models/MovieModel.php';
require_once '../app/models/CategoriesModel.php';
require_once '../app/models/BannerModel.php';

class HomeController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $movieModel = new MovieModel($this->db);
        $categoriesModel = new CategoriesModel($this->db);
        $bannerModel = new BannerModel($this->db);

        $categories = $categoriesModel->getCategories();
        // $moviesType1 = $movieModel->getMoviesByType(1);
        // $moviesType2 = $movieModel->getMoviesByType(2);

        $topViewedMovies = $movieModel->getMoviesByViews(9);
        $recentMovies = $movieModel->getRecentMovies(6);

        $slideBanners = $bannerModel->getBannersByType('slide');
        $hotBanners = $bannerModel->getBannersByType('hot');

        include '../app/views/home.php';
    }
}
?>
