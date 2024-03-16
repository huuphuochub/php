<?php
require_once '../app/core/DatabaseQuery.php';

class MovieModel extends DatabaseQuery
{
    public function search_movies($keyword) 
    {
        $query = " SELECT * FROM movies where name LIKE '%".$keyword."%'";
        return $this->executeSelectQuery($query);
    }
    public function getAllMovies()
    {
        $query = "SELECT * FROM movies where type = 1";
        return $this->executeSelectQuery($query);
    }


    public function getMoviesByViews($limit = 9)
    {
        $query = "SELECT * FROM movies where type = 1 ORDER BY views DESC LIMIT :limit";
        return $this->executeSelectQuery($query, [':limit' => $limit]);
    }

    public function getRecentMovies($limit = 6)
    {
        $query = "SELECT * FROM movies where type = 1 ORDER BY creation_date DESC LIMIT :limit";
        return $this->executeSelectQuery($query, [':limit' => $limit]);
    }


    public function getMovieById($id)
    {
        $query = "SELECT * FROM movies WHERE id = :id";
        return $this->executeSelectQuery($query, [':id' => $id], true);
    }

    // public function getMoviesByType($type) {
    //     $query = "SELECT * FROM movies WHERE type = :type";
    //     return $this->executeSelectQuery($query, [':type' => $type]);
    // }

    // public function getMoviesByCategoryId($categoriesId) {
    //     $query = "SELECT * FROM movies WHERE categories_id = :categoriesId";
    //     return $this->executeSelectQuery($query, [':categoriesId' => $categoriesId]);
    // }
    public function getMovieInfoById($movieId)
    {
        $query = "SELECT name as movie_name FROM movies WHERE id = :movieId";
        $params = [':movieId' => $movieId];
        return $this->db->executeSelectQuery($query, $params);
    }

    public function getShowtimesByMovieName($movieName) {
        $query = "SELECT movies.name as movie_name, showtimes.*
                  FROM showtimes
                  INNER JOIN movies ON showtimes.movie_id = movies.id
                  WHERE movies.name = :movieName";
        $params = [':movieName' => $movieName];
        return $this->executeSelectQuery($query, $params);
    }
    
    public function getShowtimesByMovieId($movieId) {
        $query = "SELECT movies.name as movie_name, showtimes.*
                  FROM showtimes
                  INNER JOIN movies ON showtimes.movie_id = movies.id
                  WHERE movies.id = :movieId";
        $params = [':movieId' => $movieId];
        return $this->executeSelectQuery($query, $params);
    }
    public function getTicketPrice($movieId) {
        $query = "SELECT price FROM movies WHERE id = :movie_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result['price'];
        } else {
            return null; 
        }
    }
    
    
}
?>