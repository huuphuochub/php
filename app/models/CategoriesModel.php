<?php
require_once '../app/core/DatabaseQuery.php';

class CategoriesModel extends DatabaseQuery {

    public function getCategories() {
        $query = "SELECT * FROM categories";
        return $this->executeSelectQuery($query);
    }

    public function getCategoriesByMovieId($moviesId) {
        $query = "SELECT c.* FROM categories AS c JOIN movies_categories AS mc ON c.id = mc.categories_id WHERE mc.movies_id = :movies_id";
        return $this->executeSelectQuery($query, [':movies_id' => $moviesId]);
    }
}
?>
