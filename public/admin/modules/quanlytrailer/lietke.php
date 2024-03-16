<?php
$sql_lietke_donhang = "SELECT * FROM youtube_links ORDER BY movies_id ASC";
$stmt = $db->prepare($sql_lietke_donhang);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$moviesData = array();

foreach ($result as $row) {
    $movies_id = $row['movies_id'];
    $trailer_type = $row['trailer_type'];
    $youtube_url = $row['youtube_url'];

    if (!isset($moviesData[$movies_id])) {
        $moviesData[$movies_id] = array(
            'movies_id' => $movies_id,
            'name' => '',
            'International Trailer' => '',
            'Official Trailer' => '',
            'Teaser Trailer' => ''
        );
    }

    if (empty($moviesData[$movies_id]['name'])) {
        $sql_movie_info = "SELECT name FROM movies WHERE id = :movies_id";
        $stmt_movie_info = $db->prepare($sql_movie_info);
        $stmt_movie_info->bindParam(':movies_id', $movies_id, PDO::PARAM_INT);
        $stmt_movie_info->execute();
        $movie_info = $stmt_movie_info->fetch(PDO::FETCH_ASSOC);

        if ($movie_info) {
            $moviesData[$movies_id]['name'] = $movie_info['name'];
        }
    }
    $moviesData[$movies_id][$trailer_type] = $youtube_url;

}

?>

<p style="text-align: center; font-weight: bold; font-size: 30px; margin-top: 30px;">Danh sách trailer</p>

<table style="width: 90%; margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color: #fff;">
        <tr>
            <th>Tên phim</th>
            <th>International Trailer</th>
            <th>Official Trailer</th>
            <th>Teaser Trailer</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>

    <?php
    foreach ($moviesData as $movieData) {
    ?>
        <tr>
            <td><?php echo $movieData['name']; ?></td>
            <td><?php echo $movieData['International Trailer']; ?></td>
            <td><?php echo $movieData['Official Trailer']; ?></td>
            <td><?php echo $movieData['Teaser Trailer']; ?></td>
            <td><a style="margin-right: 5px;"
                href="modules/quanlytrailer/xuly.php?idmovie=<?php echo $movieData['movies_id'] ?>"><i class="fa-solid fa-trash-can"></i></a> </td>
        </tr>
    <?php
    }
    ?>
</table>
