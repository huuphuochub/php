<?php
$id_theloai = isset($_GET['idtheloai']) ? $_GET['idtheloai'] : 0; 

$sql_sua_theloaisp = "SELECT * FROM categories WHERE id = :id LIMIT 1";
$stmt = $db->prepare($sql_sua_theloaisp);
$stmt->bindParam(':id', $id_theloai, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Sửa loại phim</p>
<table border="1" style="width: 50%;margin: 0 auto;" class="table table-bordered">
    <form method="POST" action="modules/quanlytheloai/xuly.php?idtheloai=<?php echo $id_theloai ?>">
        <?php
        foreach ($result as $row) {
        ?>
            <tr>
                <td>Tên loại</td>
                <td><input type="text" size="35" value="<?php echo $row['name'] ?>" name="name"></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><?php echo $row['id'] ?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" style="margin-left: 35%;" name="suatheloai"
                        value="Sửa danh mục sản phẩm"></td>
            </tr>
        <?php
        }
        ?>
    </form>
</table>
