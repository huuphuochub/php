<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');

if (isset($_POST['name'])) {
    $tenloaisp = $_POST['name'];
     } else {
        echo 'lỗi';
     }
     if (isset($_POST['themtheloai'])) {
        $tenloaisp = $_POST['name'];
        $sql_check_exist = "SELECT id FROM categories WHERE name = :tenloaisp";
        $stmt_check_exist = $db->prepare($sql_check_exist);
        $stmt_check_exist->bindParam(':tenloaisp', $tenloaisp, PDO::PARAM_STR);
        $stmt_check_exist->execute();
    
        if ($stmt_check_exist->rowCount() > 0) {
            $thongbao = 'tên thể loại đã tồn tại, vui lòng nhập tên khác.';
            $_SESSION['thongbao'] = $thongbao;
            header('Location:../../index.php?action=quanlytheloaiphim&query=loi');
        } else {
            $sql_them = "INSERT INTO categories (name) VALUES (:tenloaisp)";
            $stmt = $db->prepare($sql_them);
            $stmt->bindParam(':tenloaisp', $tenloaisp, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:../../index.php?action=quanlytheloaiphim&query=lietke');

        }
    
    
} else if (isset($_POST['suatheloai'])) {
    $id_theloai = isset($_GET['idtheloai']) ? $_GET['idtheloai'] : 0;
    $sql_update = "UPDATE categories SET name=:tenloaisp WHERE id=:id_theloai";
    $stmt = $db->prepare($sql_update);
    $stmt->bindParam(':tenloaisp', $tenloaisp, PDO::PARAM_STR);
    $stmt->bindParam(':id_theloai', $id_theloai, PDO::PARAM_INT);
    $stmt->execute();
    header('Location:../../index.php?action=quanlytheloaiphim&query=lietke');
} else {
    $id_theloai = isset($_GET['idtheloai']) ? $_GET['idtheloai'] : 0;
    $sql_xoa = "DELETE FROM categories WHERE id=:id_theloai";
    $stmt = $db->prepare($sql_xoa);
    $stmt->bindParam(':id_theloai', $id_theloai, PDO::PARAM_INT);
    $stmt->execute();
    header('Location:../../index.php?action=quanlytheloaiphim&query=lietke');
}
?>
