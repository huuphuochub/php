<?php
$sql_lietkexuatchieu = "SELECT s.*, m.name AS movie_name, t.name AS theater_name
                       FROM showtimes s
                        LEFT JOIN movies m ON s.movie_id = m.id
                        LEFT JOIN theaters t ON s.theater_id = t.id
                        ORDER BY s.id ASC";

$stmt = $db->prepare($sql_lietkexuatchieu);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Danh sách xuất chiếu</p>
<table style="width: 90%; margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color:#fff;">
        <tr>
            <th>STT</th>
            <th>Tên phim</th>
            <th>Tên phòng</th>
            <th>Thời gian</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    foreach ($result as $row) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>

        <td><?php echo $row['movie_name'] ?></td>
        <td><?php echo $row['theater_name'] ?></td>
        <td><?php echo $row['showtime'] ?></td>
        <td>
            <a style="margin-right: 5px;"
                href="modules/quanlyxuatchieu/xuly.php?idxuatchieu=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash-can"></i></a> |
        </td>
    </tr>
    <?php
    }
    ?>
</table>
