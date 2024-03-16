<?php

require_once '../app/models/SeatModel.php';
require_once '../app/models/MovieModel.php';

class SeatSelectionController {
    private $db;
    private $seatModel;
    private $movieModel;

    public function __construct($db) {
        $this->db = $db;
        $this->seatModel = new SeatModel($db);
        $this->movieModel = new MovieModel($db);
    }

    public function showSeatSelection($theaterId, $showtime, $movieId) {
        if ($theaterId && $showtime && $movieId) {
            $availableSeats = $this->seatModel->getAvailableSeats($theaterId, $showtime);
            $movieDetails = $this->movieModel->getMovieById($movieId);

            $ticketPrice = $this->movieModel->getTicketPrice($movieId);

            include '../app/views/seat_Selection_View.php';
        } else {
            echo "Thông tin không đầy đủ để hiển thị ghế ngồi.";
        }
    }
}



?>
