<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Thêm sản phẩm</p>
<table border="1" style="width: 60%; margin: 0 auto;" class="table table-bordered">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên phim</td>
            <td><input type="text" name="tenphim"></td>
        </tr>
        <tr>
            <td>Đạo diễn</td>
            <td><input type="text" name="director"></td>
        </tr>
        <tr>
            <td>Diễn viên</td>
            <td><input type="text" name="actor"></td>
        </tr>
        <tr>
            <td>mô tả</td>
            <td><textarea rows="10" cols="50" name="mota" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Giá vé</td>
            <td><input type="text" name="giave"></td>
        </tr>
        <tr>
            <td>thể loại</td>
            <td>
                <select name="theloai">
                    <?php
                    $sql_danhmuc = "SELECT * FROM categories ORDER BY id ASC";
                    $stmt_danhmuc = $db->prepare($sql_danhmuc);
                    $stmt_danhmuc->execute();
                    $result_danhmuc = $stmt_danhmuc->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result_danhmuc as $row_danhmuc) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>xếp hạng</td>
            <td><input type="text" name="xephang"></td>
        </tr>
        <tr>
            <td>thời gian</td>
            <td><input type="text" name="thoigian"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Hình ảnh banner</td>
            <td><input type="file" name="hinhanh_banner"></td>
        </tr>
        <tr>
            <td>đồ họa</td>
            <td><input type="text" name="dohoa"></td>
        </tr>
        
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>