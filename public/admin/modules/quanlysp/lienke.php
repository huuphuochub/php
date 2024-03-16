<?php
$sql_lietke_sp = "SELECT movies.id, movies.name,movies.director,movies.actor, movies.description, movies.price, categories.name 
AS category_name, movies.rating, movies.duration, movies.image, movies.banner_image, movies.quality, movies.type, movies.views FROM movies
INNER JOIN movies_categories ON movies.id = movies_categories.movies_id
INNER JOIN categories ON movies_categories.categories_id = categories.id
ORDER BY movies.id DESC
";
$stmt = $db->prepare($sql_lietke_sp);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Danh sách sản phẩm</p>
<table style="width: 95%; margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color:#fff;">
        <form action=""><tr>
            <th>ID</th>
            <th>Tên phim</th>
            <th>Đạo diễn</th>
            <th>Diễn viên</th>
            <th>Mô tả</th>
            <th>Giá vé</th>
            <th>Thể loại</th>
            <th>Xếp hạng</th>
            <th>thời gian</th>
            <th>Hình ảnh</th>
            <th>hình ảnh banner</th>
            <th>đồ họa</th>
            <th>Trạng thái</th>
            <th>Lượt xem</th>
            <th>Quản lý</th>
</form>
        </tr>
    </thead>
    <?php
	$i = 0;
	foreach ($result as $row) {
        $i++;
	?>
    <tr>
        <td><?php echo $i ?></td>
        <td name="tenphim"><?php echo $row['name'] ?></td>
        <td><?php echo $row['director'] ?></td>
        <td><?php echo $row['actor'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['category_name'] ?></td>
        <td><?php echo $row['rating'] ?></td>
        <td><?php echo $row['duration'] ?></td>
        <td><img src="../../public/img/images/<?php echo $row['image'] ?>" width="150px"></td>
        <td><img src="../../public/img/images/<?php echo $row['banner_image'] ?>" width="150px"></td>
        <td><?php echo $row['quality'] ?></td>
        <td><?php if ($row['type'] == 1) {
					echo 'kích hoạt';
				} else {
					echo 'ẩn';
				} ?>
        </td>
        <td><?php echo $row['views'] ?></td>
        <td>
            <a href="modules/quanlysp/xuly.php?idphim=<?php echo $row['id'] ?>"><i
                    class="fa-solid fa-trash-can"></i></a> |
                     <a href="?action=quanlysp&query=sua&idphim=<?php echo $row['id'] ?>"><i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
	}
	?>

</table>