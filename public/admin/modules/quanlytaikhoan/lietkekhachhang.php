<?php
$sql_lietke_khachhang = "SELECT * FROM users  ORDER BY id ASC";
$stmt = $db->prepare($sql_lietke_khachhang);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Danh sách tài khoản khách hàng</p>
<table style="width: 90%;margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color:#fff;">
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Ngày tạo</th>
            <th>xóa khách hàng</th>
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
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['created_at'] ?></td>
        <td>
        <form action="modules/quanlytaikhoan/xuly.php" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $row['id']; ?>">
                <button type="submit" name="xoauser" style="background: none; border: none; cursor: pointer;">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </form>
        </td>

    </tr>
    <?php
    }
    ?>
    
</table>