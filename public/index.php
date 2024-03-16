<?php
session_start();
ob_start();
$db = require_once '../config/database.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/MoviesController.php';
require_once '../app/controllers/MoviesDetailController.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/TimeSelectionController.php';
require_once '../app/controllers/SeatSelectionController.php';
require_once '../app/controllers/PaymentController.php';
require_once '../app/controllers/BookingController.php';

include_once '../app/views/header.php';

$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null; // Lấy ID từ URL

switch ($page) {
    case 'home':
        $controller = new HomeController($db);
        $controller->index();
        break;
    case 'product_detail':
        if ($id !== null) {
            $controller = new MoviesDetailController($db);
            $controller->detail(); // Gửi ID đến phương thức detail
        } else {
            echo 'Không có sản phẩm';
        }
        break;
    case 'movies':
        $controller = new MoviesController($db);
        $controller->index();
        break;
    case 'guimai':
        $controller = new PHPMailer($db);

    case 'login':
        $controller = new LoginController($db);
        $controller->login();
        break;
    case 'register':
        $controller = new RegisterController($db);
        $controller->register();
        break;
    case 'search-movie':
        $controller = new MoviesController($db);
        $controller->search($_GET['keyword']);
        break;
    case 'chongio':
        $controller = new TimeSelectionController($db);
        $controller->showTimeSelection($id); // Giả sử $id là ID của phim hoặc suất chiếu
        break;

    case 'chonghe':

        $controller = new SeatSelectionController($db);

        // Lấy các tham số từ URL hoặc từ nơi khác
        $theaterId = $_GET['theater_id'] ?? null; // Thay đổi tên tham số nếu cần
        $showtime = $_GET['time'] ?? null; // Thay đổi tên tham số nếu cần
        $movieId = $_GET['movie_id'] ?? null; // Thay đổi tên tham số nếu cần

        // Kiểm tra xem các tham số có tồn tại không trước khi gọi phương thức
        if ($theaterId && $showtime && $movieId) {
            $controller->showSeatSelection($theaterId, $showtime, $movieId);
        } else {
            echo "Thông tin không đầy đủ để hiển thị ghế ngồi.";
        }
        break;

    case 'thanhtoan':

        $controller = new PaymentController($db);
        $controller->showPaymentPage();
        break;
    case 'process_booking':
        $controller = new BookingController($db);
        $controller -> processBooking();
        // if ($controller->processBooking()) {
        //     echo "Thanh toán thành công!";
        // } else {
        //     echo "Có lỗi xảy ra trong quá trình đặt vé";
        // }
        break;



    default:
        echo 'Trang không tồn tại';
        break;
}

include_once '../app/views/footer.php';
?>