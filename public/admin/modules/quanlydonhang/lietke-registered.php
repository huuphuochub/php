<?php
$sql_lietke_donhang = "SELECT * FROM bookings ORDER BY id ASC";
$stmt = $db->prepare($sql_lietke_donhang);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<p style="text-align: center;font-weight: bold;font-size: 30px;margin-top: 30px;">Danh sách đơn hàng</p>
<table style="width: 90%; margin: 0 auto;" class="table table-bordered table-hover">
    <thead class="" style="background-color: #000; color:#fff;">
        <tr>
            <th>mã đơn hàng</th>
            <th>thời gian</th>
            <th>tổng tiền</th>
            <th>tùy chọn</th>
        </tr>
    </thead>
    <?php
	$i = 0;
	foreach ( $result as $row){
		$i++;
	?>
    <tr>
        <td><?php echo $row['id'] . 'TC' ?></td>
        <td><?php echo $row['booking_time'] ?></td>
        <td><?php echo $row['total_price'] ?></td>
        <td>
            <a href="index.php?action=donhang&query=xemdonhang&idve=<?php echo $row['id'] ?>">Xem đơn hàng</a>
        </td>
    </tr>
    <?php
	}
	?>

</table>