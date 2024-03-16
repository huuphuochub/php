<style>
    .containerr {
        width: 80%;
        margin: 0 auto;
    }

    /* Text Center */
    .text-center {
        text-align: center;
    }

    /* Card Styles */
    .card {
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 15px;
    }

    /* Select Box */
    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    /* Date Buttons */
    .btn-group {
        display: flex;
        margin-bottom: 15px;
    }

    .btn {
        flex: 1;
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
        background-color: white;
        color: black;
        text-decoration: none;
    }

    .btn.active,
    .btn:hover {
        background-color: #f0f0f0;
    }

    /* Alert Message */
    .alert {
        padding: 10px;
        background-color: #ffc107;
        color: black;
        border-radius: 4px;
    }

    #showtimes {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    #showtimes h3 {
        color: #333;
        margin-bottom: 15px;
    }

    .showtime-entry {
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .showtime-entry h4 {
        color: #007bff;
        margin-bottom: 5px;
    }

    .showtime-entry p {
        color: #555;
        margin: 5px 0;
    }

    .time-link {
        display: inline-block;
        margin: 3px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .time-link:hover {
        background-color: #0056b3;
    }
</style>
<div class="containerr mt-4">
    <div class="roww">
        <div class="col-md-8">
            <h2 class="text-center">Mua vé trực tuyến</h2>
            <div class="card card-sm">
                <div class="card-body">
                    <div class="roww">
                        <div class="coll">
                            <select class="form-control btn-select-region">
                                <option value="1" selected="">Tp. Hồ Chí Minh</option>
                                <!-- Thêm các tùy chọn khác ở đây -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="alert alert-warning mb-3">
                <i class="fe fe-info"></i> Nhấn vào suất chiếu để tiến hành mua vé
            </div>
            <div id="showtimes">
            <?php
$uniqueShowtimes = [];

foreach ($showtimes as $showtime) {
    $time = $showtime['showtime'];

    // Kiểm tra xem giờ đã xuất hiện chưa
    if (!in_array($time, $uniqueShowtimes)) {
        // Nếu chưa xuất hiện, hiển thị và thêm vào mảng
        $uniqueShowtimes[] = $time;
        
        ?>
        <div class="showtime-entry">
            <h4>Flix Hub</h4>
            <p>Phim: <?= $showtime['movie_name'] ?></p>
            <p>Thời gian:
                <?php if (!empty($showtime['showtime'])): ?>
                <a href="index.php?page=chonghe&movie=<?= $showtime['movie_name'] ?>
                &time=<?= $showtime['showtime'] ?>&movie_id=<?= $showtime['movie_id'] ?>
                &theater_id=<?= $showtime['theater_id'] ?>" class="time-link">
                <?= $showtime['showtime'] ?></a>
            <?php else: ?>
                    Không có suất chiếu
                <?php endif; ?>
            </p>
        </div>
        <?php
    }
}
?>





                <!-- Thêm các lịch chiếu khác tại đây -->
            </div>
        </div>
        <div class="col-md-4">
            <!-- Nội dung cho cột bên phải -->
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for date selection
        document.querySelectorAll('.date').forEach(button => {
            button.addEventListener('click', function () {
                document.querySelectorAll('.date').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                // Thêm mã để xử lý thay đổi ngày ở đây
            });
        });
    });
</script>