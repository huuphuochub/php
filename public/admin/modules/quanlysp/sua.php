<?php
$id_phim = isset($_GET['idphim']) ? $_GET['idphim'] : 0; 

$sql_sua_sp = "SELECT * FROM movies WHERE id = :id LIMIT 1";
$stmt = $db->prepare($sql_sua_sp);
$stmt->bindParam(':id', $id_phim, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Sửa sản phẩm</p>

<table style="width: 100%;" class="table table-bordered">
    <?php
	foreach ($result as $row){
	?>
    <form method="POST" action="modules/quanlysp/xuly.php?idphim=<?php echo $row['id'] ?>" enctype="multipart/form-data">
        <tr>
            <td>Tên phim</td>
            <td><input type="text" value="<?php echo $row['name'] ?>" name="tenphim"></td>
        </tr>
        <tr>
            <td>Đạo diễn</td>
            <td><input type="text" name="director" value="<?php echo $row['director'] ?>"></td>
        </tr>
        <tr>
            <td>Diễn viên</td>
            <td><input type="text" name="actor" value="<?php echo $row['actor'] ?>"></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea rows="10" cols="50" name="mota" style="resize: none;"><?php echo $row['description'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Giá vé</td>
            <td><input type="text" value="<?php echo $row['price'] ?>" name="giave"></td>
        </tr>
        <tr>
            <td>Thể loại phim</td>
            <td>
                <select name="theloai">
                    <?php
                        $sql_theloai = "SELECT * FROM categories ORDER BY id ASC";
                        $stmt_theloai = $db->prepare($sql_theloai);
                        $stmt_theloai->execute();
                        $result_theloai = $stmt_theloai->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result_theloai as $row_theloai) {
                            if ($row_theloai['id'] == $row['id']) {
                                echo "<option selected value='{$row_theloai['id']}'>{$row_theloai['name']}</option>";
                            } else {
                                echo "<option value='{$row_theloai['id']}'>{$row_theloai['name']}</option>";
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Xếp hạng</td>
            <td><input type="text" value="<?php echo $row['rating'] ?>" name="xephang"></td>
        </tr>
        <tr>
            <td>Thời gian</td>
            <td><input type="text" value="<?php echo $row['duration'] ?>" name="thoigian"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="../public/img/images/<?php echo $row['image'] ?>" width="150px">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh banner</td>
            <td>
                <input type="file" name="hinhanh_banner">
                <img src="../public/img/images/<?php echo $row['banner_image'] ?>" width="150px">
            </td>
        </tr>
        <tr>
            <td>Đồ họa</td>
            <td><input type="text" value="<?php echo $row['quality'] ?>" name="dohoa"></td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <?php
                        if ($row['type'] == 1) {
                            echo "<option value='1' selected>Kích hoạt</option>";
                            echo "<option value='0'>Ẩn</option>";
                        } else {
                            echo "<option value='1'>Kích hoạt</option>";
                            echo "<option value='0' selected>Ẩn</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
        </tr>
    </form>
    <?php
	}
	?>
</table
