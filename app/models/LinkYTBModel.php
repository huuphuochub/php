<?php
require_once '../app/core/DatabaseQuery.php';

class LinkYTBModel extends DatabaseQuery {

    public function getVideosByMovieId($moviesId) { 
        $query = "SELECT * FROM youtube_links WHERE movies_id = :moviesId";
        return $this->executeSelectQuery($query, [':moviesId' => $moviesId]);
    }

}
?>
