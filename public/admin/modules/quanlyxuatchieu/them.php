<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Thêm xuất chiếu</p>
<table border="1" style="width: 60%; margin: 0 auto;" class="table table-bordered">
    <form method="POST" action="modules/quanlyxuatchieu/xuly.php" enctype="multipart/form-data">
       
        <tr>
            
            <td>tên phim</td>
            <td>
                <select name="tenphim">
                    <?php
                    $sql_tenphim = "SELECT * FROM movies ORDER BY id ASC";
                    $stmt_tenphim = $db->prepare($sql_tenphim);
                    $stmt_tenphim->execute();
                    $result_tenphim = $stmt_tenphim->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result_tenphim as $row_tenphim) {
                    ?>
                        <option value="<?php echo $row_tenphim['id'] ?>"><?php echo $row_tenphim['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>phòng</td>
            <td>
                <select name="phong">
                    <?php
                    $sql_phong = "SELECT * FROM theaters ORDER BY id ASC";
                    $stmt_phong = $db->prepare($sql_phong);
                    $stmt_phong->execute();
                    $result_phong = $stmt_phong->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result_phong as $row_phong) {
                    ?>
                        <option value="<?php echo $row_phong['id'] ?>"><?php echo $row_phong['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>thời gian chiếu</td>
            <td><input type="datetime-local" name="thoigian"></td>
        </tr>
        
        <tr>
            <td colspan="2"><input type="submit" name="themxuatchieu" value="Thêm xuất chiếu"></td>
        </tr>
    </form>
</table>