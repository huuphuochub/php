<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');
if (isset($_POST['themxuatchieu'])) {
    $idphim = $_POST['tenphim'];
    $idphong = $_POST['phong'];
    $thoigian = $_POST['thoigian'];

    $sql_insert = "INSERT INTO showtimes (movie_id, theater_id, showtime) VALUES (:id_movie, :theater_id, :showtime)";
        $stmt_insert = $db->prepare($sql_insert);

        $stmt_insert->bindParam(':id_movie', $idphim, PDO::PARAM_INT);
        $stmt_insert->bindParam(':theater_id', $idphong, PDO::PARAM_INT);
        $stmt_insert->bindParam(':showtime', $thoigian, PDO::PARAM_STR);

        $stmt_insert->execute();
        header('Location:../../index.php?action=quanlyxuatchieu&query=lietke');



} else {
    $id_xuatchieu = isset($_GET['idxuatchieu']) ? $_GET['idxuatchieu'] : 0;
    $sql_xoa = "DELETE FROM showtimes WHERE id=:id_xuatchieu";
    $stmt = $db->prepare($sql_xoa);
    $stmt->bindParam(':id_xuatchieu', $id_xuatchieu, PDO::PARAM_INT);
    $stmt->execute();
    header('Location:../../index.php?action=quanlyxuatchieu&query=lietke');



}
?>