<?php
require_once '../app/models/MovieModel.php';

class TimeSelectionController {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }


    
    public function showTimeSelection($movieId) {
        
        // Kiểm tra xem có tên phim hoặc ID phim được truyền qua không
        if (isset($_GET['movie'])) {
            $movieName = urldecode($_GET['movie']);
            // Thực hiện truy vấn cơ sở dữ liệu để lấy thông tin suất chiếu dựa trên tên phim
            $model = new MovieModel($this->db);
            $showtimes = $model->getShowtimesByMovieName($movieName);
        } elseif ($movieId !== null) {
            // Nếu không có tên phim, sử dụng ID phim để lấy thông tin suất chiếu
            $model = new MovieModel($this->db);
            $showtimes = $model->getShowtimesByMovieId($movieId);
        } else {
            // Xử lý trường hợp không có thông tin phim
            echo 'Không có thông tin phim';
            return;
        }
        

        // Hiển thị trang chọn giờ với thông tin suất chiếu
        include '../app/views/time_selection_view.php';
    }
}

?>
