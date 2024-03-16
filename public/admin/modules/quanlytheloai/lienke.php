<?php
$sql_lietkedanhmuc = "SELECT * FROM categories ORDER BY id ASC";
$stmt = $db->prepare($sql_lietkedanhmuc);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Danh sách loại phim</p>
<table style="width: 90%; margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color:#fff;">
        <tr>
            <th>STT</th>
            <th>thể loại phim</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <?php
	$i = 0;
    foreach ($result as $row) {
        $i++;
	?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['name'] ?></td>
        <td>
            <a style="margin-right: 5px;"
                href="modules/quanlytheloai/xuly.php?idtheloai=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash-can"></i></a> |
                    <a style="margin-left:5px"href="?action=quanlytheloaiphim&query=sua&idtheloai=<?php echo $row['id'] ?>"><i
                    class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
	}
	?>

</table>