<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');

if (isset($_GET['idve'])) {
    $order_id = $_GET['idve'];

    try {
        $sql_lietke_donhang = "SELECT
        users.name AS user_name, 
        users.email AS user_email,
        movies.name AS movie_name,
        theaters.name AS theater_name,
        seats.seat_number,
        showtimes.showtime,
        bookings.total_price,
        bookings.booking_time
    FROM
        bookings
    JOIN
        users ON bookings.user_id = users.id
    JOIN
        booking_details ON bookings.id = booking_details.booking_id
    JOIN
        seats ON booking_details.seat_id = seats.id
    JOIN
        showtimes ON booking_details.showtime = showtimes.showtime
    JOIN
        theaters ON seats.theater_id = theaters.id
    JOIN
        movies ON showtimes.movie_id = movies.id
    WHERE
        bookings.id = :order_id;";

        $stmt = $db->prepare($sql_lietke_donhang);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if ($result && is_array($result) && count($result) > 0) {
?>

            <p style="text-align: center; font-weight: bold; font-size: 30px; margin-top: 30px;">Xem đơn hàng</p>
            <table style="width: 90%; margin: 0 auto;" class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Tên phim</th>
                        <th>Phòng chiếu</th>
                        <th>Ghế đặt</th>
                        <th>Thời gian đặt vé</th>
                        <th>Tổng tiền</th>
                        <th>Thời gian chiếu</th>
                        <th></th>
                    </tr>
                </thead>
                <tr>
                    <td><?php echo $result['user_name']; ?></td>
                    <td><?php echo $result['user_email']; ?></td>
                    <td><?php echo $result['movie_name']; ?></td>
                    <td><?php echo $result['theater_name']; ?></td>
                    <td><?php echo $result['seat_number']; ?></td>
                    <td><?php echo $result['booking_time']; ?></td>
                    <td><?php echo $result['total_price'] . '0 đ'; ?></td>
                    <td><?php echo $result['showtime']; ?></td>
                    <td><a href="index.php?action=quanlydonhangddk&query=lietke">OK</a></td>
                </tr>
            </table>
<?php
        } else {
            echo 'Không tìm thấy đơn hàng hoặc có lỗi trong quá trình xử lý.';
            // Debug
        
        }
    } catch (PDOException $e) {
        echo "Lỗi SQL: " . $e->getMessage();
    } finally {
        $db = null;
    }
} else {
    echo 'Thiếu thông tin đơn hàng.';
}
?>
