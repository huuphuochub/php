<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');


$tenphim = $_POST['tenphim'];
$daodien = $_POST['director'];
$dienvien = $_POST['actor'];
$xephang = $_POST['xephang'];
$giave = $_POST['giave'];
$theloai = $_POST['theloai'];
$dohoa = $_POST['dohoa'];
$hinhanh = $_FILES['hinhanh']['name']; 
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name']; 
$hinhanh = time() . '_' . $hinhanh;
$hinhanh_banner = $_FILES['hinhanh_banner']['name'];
$hinhanh_banner_tmp = $_FILES['hinhanh_banner']['tmp_name'];
$hinhanh_banner = time() . '_' . $hinhanh_banner;
$mota = $_POST['mota'];
$tinhtrang = $_POST['tinhtrang'];
$thoigian = $_POST['thoigian'];


$upload_directory = $_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/public/img/images/';

if (isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO movies 
    (name, description, price, categories_id, rating, duration, image, banner_image, quality, type, director, actor) 
    VALUES (:tenphim, :mota, :giave, :theloai, :xephang, :thoigian, :hinhanh, :hinhanh_banner, :dohoa, :tinhtrang, :director, :actor);";
    $stmt_them = $db->prepare($sql_them);
    $stmt_them->bindParam(':tenphim', $tenphim, PDO::PARAM_STR);
    $stmt_them->bindParam(':mota', $mota, PDO::PARAM_STR);
    $stmt_them->bindParam(':giave', $giave, PDO::PARAM_INT);
    $stmt_them->bindParam(':theloai', $theloai, PDO::PARAM_INT);
    $stmt_them->bindParam(':xephang', $xephang, PDO::PARAM_INT);
    $stmt_them->bindParam(':thoigian', $thoigian, PDO::PARAM_STR);
    $stmt_them->bindParam(':hinhanh', $hinhanh, PDO::PARAM_STR);
    $stmt_them->bindParam(':hinhanh_banner', $hinhanh_banner, PDO::PARAM_STR);
    $stmt_them->bindParam(':dohoa', $dohoa, PDO::PARAM_STR);
    $stmt_them->bindParam(':tinhtrang', $tinhtrang, PDO::PARAM_INT);
    $stmt_them->bindParam(':director', $daodien, PDO::PARAM_STR);
    $stmt_them->bindParam(':actor', $dienvien, PDO::PARAM_STR);


	$stmt_them->execute();


	$new_movie_id = $db->lastInsertId();

	$sql_them_categories = "INSERT INTO movies_categories (movies_id, categories_id) VALUES (:idphim, :idloai)";
	$stmt_them_categories = $db->prepare($sql_them_categories);
	$stmt_them_categories->bindParam(':idphim', $new_movie_id, PDO::PARAM_INT);
	$stmt_them_categories->bindParam(':idloai', $theloai, PDO::PARAM_INT);
	$stmt_them_categories->execute();

	

    move_uploaded_file($hinhanh_tmp, $upload_directory . $hinhanh);
    move_uploaded_file($hinhanh_banner_tmp, $upload_directory . $hinhanh_banner);

    header('Location:../../index.php?action=quanlysp&query=lietke');
} elseif (isset($_POST['suasanpham'])) {
    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, $upload_directory . $hinhanh);
        move_uploaded_file($hinhanh_banner_tmp, $upload_directory . $hinhanh_banner);

        $sql = "SELECT * FROM movies WHERE id = :id LIMIT 1";
        $stmt_select = $db->prepare($sql);
        $stmt_select->bindParam(':id', $_GET['idphim'], PDO::PARAM_INT);
        $stmt_select->execute();
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink($upload_directory . $row['image']);

        $sql_update = "UPDATE movies SET name=:tenphim, description=:mota, price=:giave, categories_id=:theloai, rating=:xephang, duration=:thoigian, image=:hinhanh, banner_image=:hinhanh_banner, quality=:dohoa, type=:tinhtrang, director=:daodien, actor=:dienvien WHERE id=:id";
    } else {
        $sql_update = "UPDATE movies SET name=:tenphim, description=:mota, price=:giave, categories_id=:theloai, rating=:xephang, duration=:thoigian, quality=:dohoa,type=:tinhtrang, director=:daodien, actor=:dienvien WHERE id=:id";
    }

    $stmt_update = $db->prepare($sql_update);
    $stmt_update->bindParam(':tenphim', $tenphim, PDO::PARAM_STR);
    $stmt_update->bindParam(':mota', $mota, PDO::PARAM_STR);
    $stmt_update->bindParam(':giave', $giave, PDO::PARAM_INT);
    $stmt_update->bindParam(':theloai', $theloai, PDO::PARAM_INT);
    $stmt_update->bindParam(':xephang', $xephang, PDO::PARAM_INT);
    $stmt_update->bindParam(':thoigian', $thoigian, PDO::PARAM_STR);
    $stmt_update->bindParam(':hinhanh', $hinhanh, PDO::PARAM_STR);
    $stmt_update->bindParam(':hinhanh_banner', $hinhanh_banner, PDO::PARAM_STR);
    $stmt_update->bindParam(':dohoa', $dohoa, PDO::PARAM_STR);
    $stmt_update->bindParam(':id', $_GET['idphim'], PDO::PARAM_INT);
    $stmt_update->bindParam(':daodien', $daodien, PDO::PARAM_STR);
    $stmt_update->bindParam(':dienvien', $dienvien, PDO::PARAM_STR);
    $stmt_update->bindParam(':tinhtrang', $tinhtrang, PDO::PARAM_STR);
    $stmt_update->execute();
    header('Location:../../index.php?action=quanlysp&query=lietke');
} else {
    $id = $_GET['idphim'];

    $sql_select = "SELECT * FROM movies WHERE id = :id LIMIT 1";
    $stmt_select = $db->prepare($sql_select);
    $stmt_select->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_select->execute();
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    unlink($upload_directory . $row['image']);

    $sql_xoa = "DELETE FROM movies WHERE id=:id";
    $stmt_xoa = $db->prepare($sql_xoa);
    $stmt_xoa->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt_xoa->execute();
    header('Location:../../index.php?action=quanlysp&query=lietke');
}
?>