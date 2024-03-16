<?php
require_once '../app/core/DatabaseQuery.php';

class SeatModel extends DatabaseQuery
{
 
    public function getAvailableSeats($theaterId, $showtime) {
        // Kết nối CSDL
        $db = $this->db;
        
        // Chuẩn bị truy vấn SQL
        $query = "SELECT s.* FROM seats s
                 WHERE s.theater_id = :theaterId";
        
        // Chuẩn bị các tham số và giá trị tương ứng
        $params = [
            ':theaterId' => $theaterId
        ];
        
        // Chuẩn bị và thực thi truy vấn
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        
        // Trả về kết quả
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateSeatStatus($seatId) {
        $query = "UPDATE seats SET status = 'booked' WHERE id = :seatId";
        $this->executeAuthQuery($query, [ ':seatId' => $seatId]);
    }
    public function getSeatId($seatNumber, $theater_id){
        $query = "select id from seats 
                    where seat_number = :seat_number and theater_id = :theater_id";
        return $this->executeSelectQuery($query, [':seat_number' => $seatNumber, ':theater_id' => $theater_id], true);

    }
    // public function getMovieInFor(){
    //     $query = "select * from 
    //     booking_details bk inner join seats s on bk.seat_id = s.id
    //     inner join theaters t on s.theater_id = t.id
    //     inner join showtimes st on t.id = st.theater_id
    //     inner join movies m on st.movie_id = m.id
    //     where ";
    // }
    
}



?>