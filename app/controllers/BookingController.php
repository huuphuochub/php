<?php
require_once '../app/models/BookingModel.php';
require_once 'PHPMailer.php';

// Bạn có thể thêm bất kỳ model nào khác mà bạn cần

class BookingController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function processBooking() {
        // $mail = new PHPMailer(true);
        $bookingModel = new BookingModel($this->db);
        $seatModel = new SeatModel($this->db);
        $showtime = $_POST['showtime'];
        $movieName = $_POST['movieName'];
        $userId = $_SESSION['user']['id'];
        $userEmail = $_SESSION['user']['email'];
        $totalPrice = $_POST['totalAmount'];
        $theaterId = $_POST['theaterId'];
        $selectedSeatsId = $_POST["selectedSeats"];

        // $bookingId = $bookingModel->createBooking($userId, $totalPrice, $selectedSeats);
        
        $bookingId = $bookingModel->createTicket($userId, $totalPrice, $movieName, $theaterId, $showtime, $selectedSeatsId);

        // Cập nhật trạng thái ghế (ví dụ: đánh dấu là đã đặt)
        foreach ($selectedSeatsId as $seatId) {
            $seatModel->updateSeatStatus($seatId);
        }
        // try {
        //     $bookingId = $bookingModel->createBooking($userId, $totalPrice, $selectedSeats);

        //     // Cập nhật trạng thái ghế (ví dụ: đánh dấu là đã đặt)
        //     foreach ($selectedSeats as $seatNumber) {
        //         $seatModel->updateSeatStatus($seatNumber, 'booked');
        //     }

        //     // Trả về true nếu quá trình đặt vé thành công
        //     return true;
        // } catch (Exception $e) {
        //     // Xử lý lỗi
        //     return false;
        // }
        include_once '../app/views/success.php';
    }


}


?>
