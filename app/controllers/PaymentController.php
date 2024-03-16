<?php
require_once '../app/models/SeatModel.php';
require_once '../app/models/MovieModel.php';

class PaymentController {
    protected $db;
    private $seatModel;


    public function __construct($db) {
        $this->db = $db;
    }

    public function showPaymentPage() {
        $seatModel = new SeatModel($this->db);
        if (!isset($_SESSION['user'])) {
            // Chuyển hướng người dùng nếu họ chưa đăng nhập
            header('Location: index.php?page=login');
            exit;
        }
        $theaterId = $_POST['theaterId'];
        // $selectedSeats = $_POST['selectedSeats'] ?? null;
        $selectedSeats = explode(',', $_POST['selectedSeats']);
        $movieName = $_POST['movieName'] ?? null;
        $showtime = $_POST['showtime'] ?? null;
        $totalAmount = $_POST['totalAmount'] ?? null;
        $ticketPrice = $_POST['ticketPrice'] ?? null;
        $theaterId = $_POST['theaterId'];
        if (!$selectedSeats || !$movieName || !$showtime || !$totalAmount || !$ticketPrice) {
            // Xử lý trường hợp thiếu dữ liệu cần thiết
            echo "Thông tin thanh toán không đầy đủ.";
            return;
        }
        foreach ($selectedSeats as $seatNum) {
            $seatId = $seatModel->getSeatId($seatNum, $theaterId);
            // Kiểm tra nếu $seatId có giá trị và thêm vào mảng
            if ($seatId !== null) {
                $seatIds[] = $seatId;
            }
        }
        // for ($i=0; $i < count($selectedSeats); $i++) { 
        //     $seatId = $seatModel -> getSeatId($selectedSeats[$i], $theaterId);
        //     if($seatId !== null){
        //         $seatIds[]= $seatId;
        //     }
        // }

        
        $details = [
            // 'selectedSeats' => htmlspecialchars($selectedSeats),
            'movieName' => htmlspecialchars($movieName),
            'showtime' => htmlspecialchars($showtime),
            'totalAmount' => htmlspecialchars($totalAmount),
            'ticketPrice' => htmlspecialchars($ticketPrice)
        ];

        include '../app/views/payment_view.php';
    }
}
    


?>