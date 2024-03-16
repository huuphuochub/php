<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Thêm trailer</p>
<table border="1" style="width: 60%; margin: 0 auto;" class="table table-bordered">
    <form method="POST" action="modules/quanlytrailer/xuly.php" enctype="multipart/form-data">
       
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
            <td>International Trailer</td>
            <td>
                <input type="text" name="International">
            </td>
        </tr>
        <tr>
            <td>Official Trailer</td>
            <td>
                    <input type="text"name="Official">
            </td>
        </tr>
        <tr>
            <td>Teaser Trailer</td>
            <td>
                    <input type="text" name="Teaser">
            </td>
        </tr>
        
        <tr>
            <td colspan="2"><input type="submit" name="themtrailer" value="Thêm trailer"></td>
        </tr>
    </form>
</table>