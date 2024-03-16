<?php
require_once '../app/core/DatabaseQuery.php';

class BookingModel extends DatabaseQuery {
    public function createTicket($userId, $totalPrice, $movieName, $theaterId, $showtime, $selectedSeats = []) {
        try {
            // Đảm bảo thiết lập PDO::ATTR_ERRMODE
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->db->beginTransaction();

            // Thêm dữ liệu vào bảng `bookings`
            $query = "INSERT INTO bookings (user_id, booking_time, total_price, status) VALUES (:userId, NOW(), :totalPrice, 'pending')";
            $this->executeAuthQuery($query, [':userId' => $userId, ':totalPrice' => $totalPrice]);
    
            $bookingId = $this->db->lastInsertId();
    
            // Thêm dữ liệu vào bảng `booking_details`
            $queryDetails = "INSERT INTO booking_details (booking_id, seat_id, movieName, theaterId, showtime) VALUES (:bookingId, :seatId, :movieName, :theaterId, :showtime)";
            $stmtDetails = $this->db->prepare($queryDetails);
    
            foreach ($selectedSeats as $seatId) {
                // Thực hiện truy vấn sử dụng prepare và execute
                $stmtDetails->execute([':bookingId' => $bookingId, ':seatId' => $seatId, ':movieName' => $movieName, ':theaterId' => $theaterId, ':showtime' => $showtime]);
            }
    
            $this->db->commit();
            return $bookingId;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
    
    
    


    // Các phương thức khác của BookingModel
}




?>