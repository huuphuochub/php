<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');

if (isset($_POST['themtrailer'])) {
    $tenphim = $_POST['tenphim'];
    $internationalTrailer = $_POST['International'];
    $officialTrailer = $_POST['Official'];
    $teaserTrailer = $_POST['Teaser'];

    try {
        // Thực hiện truy vấn để thêm xuất chiếu vào bảng youtube_links
        $sql_them_trailer = "INSERT INTO youtube_links (movies_id, trailer_type, youtube_url) VALUES (:tenphim, 'International Trailer', :internationalTrailer), (:tenphim, 'Official Trailer', :officialTrailer), (:tenphim, 'Teaser Trailer', :teaserTrailer)";
        
        $stmt = $db->prepare($sql_them_trailer);
        $stmt->bindParam(':tenphim', $tenphim, PDO::PARAM_INT);
        $stmt->bindParam(':internationalTrailer', $internationalTrailer, PDO::PARAM_STR);
        $stmt->bindParam(':officialTrailer', $officialTrailer, PDO::PARAM_STR);
        $stmt->bindParam(':teaserTrailer', $teaserTrailer, PDO::PARAM_STR);
        $stmt->execute();

        // Thêm thành công
        echo 'Thêm trailer thành công.';
        // Chuyển hướng người dùng sau khi thêm thành công
        header('Location:../../index.php?action=quanlytrailer&query=lietke');
        exit(); // Đảm bảo không có mã nào được thực hiện sau khi chuyển hướng

    } catch (PDOException $e) {
        // Xử lý lỗi
        echo "Lỗi: " . $e->getMessage();
    } finally {
        $db = null;
    }
} else {
    // Xóa tất cả các dòng trong bảng youtube_links có movies_id trùng với idmovie
    $movieId = $_GET['idmovie'];
    $sql_delete_links = "DELETE FROM youtube_links WHERE movies_id = :movieId";
    $stmt_delete_links = $db->prepare($sql_delete_links);
    $stmt_delete_links->bindParam(':movieId', $movieId, PDO::PARAM_INT);
    $stmt_delete_links->execute();

    // Gửi phản hồi về trang web (có thể không cần thiết nếu không cần cập nhật gì đó trên giao diện người dùng)
    $response = ['success' => true, 'message' => 'Xóa thành công'];
    header('Location:../../index.php?action=quanlytrailer&query=lietke');

}
?>
