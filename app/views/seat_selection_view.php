<style>
    .containerr {
        width: 90%;
        margin: 20px auto;
        background-color: #000;
        /* Đen */
        padding: 20px;
        color: #fff;
        /* Màu chữ trắng */
    }

    .cinema-info p,
    .legend p,
    .actions button {
        margin-bottom: 10px;
    }

    .screen {
        background-color: #444;
        color: #fff;
        padding: 5px;
        text-align: center;
    }

    .seats {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .seat-row {
        display: flex;
        justify-content: center;
        margin-bottom: 5px;
    }

    .seat {
        background-color: #ccc;
        margin: 3px;
        padding: 10px 15px;
        cursor: pointer;
        user-select: none;
        border-radius: 5%;
        width: 60px;
        /* Set the width to your desired value */
        height: 30px;
        /* Set the height to your desired value */
        position: relative;
        /* Added position relative for tooltip */
    }

    .seat.unavailable {
        background-color: #555;
        cursor: not-allowed;
    }

    .seat.selected {
        background-color: #6c7ae0;
    }

    /* Add the following styles for the seat number tooltip */
    .seat:hover::after {
        content: attr(data-seat-number);
        position: absolute;
        top: -25px;
        /* Adjust as needed */
        left: 50%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        white-space: nowrap;
    }

    .legend {
        display: flex;
        justify-content: space-around;
        margin-top: 10px;
    }

    .legend .example {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 1px solid #333;
        margin-right: 5px;
    }

    .legend .selected {
        background-color: #6c7ae0;
    }

    .legend .unavailable {
        background-color: #555;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .actions button {
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        background-color: #333;
        color: #fff;
    }

    .total {
        margin-top: 20px;

    }

    #total-amount {
        font-weight: bold;
        color: #ffffff;
        font-size: 20px;
    }
</style>
<div class="container">
    <div class="cinema-info">
        <p><strong>Flix Hub</strong></p>
        <p>rap: <?=$theaterId?></p>
        <p>Phim: <?= $movieDetails['name'] ?? 'Không có thông tin' ?></p>
        <p>Showtime: <strong><?= $_GET['time'] ?? 'Không có thông tin' ?></strong></p>
        <div class="total">
        <p>TỔNG ĐƠN HÀNG <span id="total-amount">0</span></p>
        </div>
    </div>
</div>

<!-- Phần lựa chọn ghế ngồi -->
<div class="seat-selection">
    <div class="screen">SCREEN</div>
    <div class="seats">
        <?php
        $currentRow = ''; 
        
     
        foreach($availableSeats as $seat) {
    
            $seatParts = preg_split('/(?<=[A-Z])(?=\d)/', $seat['seat_number']);
            $row = $seatParts[0];
            $number = $seatParts[1]; 
        
            if($currentRow !== $row) {
             
                if($currentRow !== '') {
                    echo '</div>';
                }
                echo '<div class="seat-row">';
                $currentRow = $row;
            }
            
            $availability_class = $seat['status'] == 'booked' ? 'unavailable' : 'available';
            // Hiển thị ghế
            echo '<div class="seat '.$availability_class.'" data-seat-number="'.$seat['seat_number'].'" data-price="'.$ticketPrice.'"><span class="seat-number">'.'</span></div>';

        }

        if($currentRow !== '') {
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="legend">
    <div><span class="seat example"></span>
        <p>Available</p>
    </div>
    <div><span class="seat example selected"></span>
        <p>Selected</p>
    </div>
    <div><span class="seat example unavailable"></span>
        <p>Unavailable</p>
    </div>
</div>
<form action="index.php?page=thanhtoan" method="post">
    <input type="hidden" name="theaterId" value="<?=$theaterId?>">
    <input type="hidden" name="selectedSeats" id="selectedSeats">
    <input type="hidden" name="movieName" value="<?= $movieDetails['name'] ?? '' ?>">
    <input type="hidden" name="showtime" value="<?= $_GET['time'] ?? '' ?>">
    <input type="hidden" name="ticketPrice" value="<?= $ticketPrice ?>">
    <input type="hidden" name="totalAmount" id="totalAmount">
    <button type="submit" class="btn-continue" onclick="submitForm()">Continue →</button>
</form>

</div>
</div>
<script>
    const seats = document.querySelectorAll('.seat.available');
    // var ticketPrice = <?= json_encode(isset($ticketPrice) ? $ticketPrice : 0); ?>;
    var ticketPrice = <?= $ticketPrice ?>;
    var selectedSeatNumbers = [];

    seats.forEach(seat => {
        seat.addEventListener('mouseenter', () => {
            const seatNumber = seat.querySelector('.seat-number');
            seatNumber.style.display = 'block';
        });

        seat.addEventListener('mouseleave', () => {
            const seatNumber = seat.querySelector('.seat-number');
            seatNumber.style.display = 'none';
        });

        // Sự kiện click cho mỗi ghế
        seat.addEventListener('click', () => {
            const seatNumber = seat.dataset.seatNumber;
            seat.classList.toggle('selected');
            if (seat.classList.contains('selected')) {
                // Nếu ghế được chọn, thêm vào mảng
                selectedSeatNumbers.push(seatNumber);
            } else {
                // Nếu ghế bị bỏ chọn, loại bỏ khỏi mảng
                const index = selectedSeatNumbers.indexOf(seatNumber);
                if (index > -1) {
                    selectedSeatNumbers.splice(index, 1);
                }
            }
          
            updateTotalAmount();
        });
    });

    function updateTotalAmount() {
        let totalAmount = selectedSeatNumbers.length * parseFloat(ticketPrice);
        document.getElementById('total-amount').innerText = new Intl.NumberFormat('vi-VN').format(totalAmount);
    }

    function submitForm() {
    document.getElementById('selectedSeats').value = selectedSeatNumbers.join(',');
    document.getElementById('selectedSeats').value = selectedSeatNumbers.join(',');
    document.getElementById('totalAmount').value = document.getElementById('total-amount').innerText; // Lấy giá trị tổng tiền
}

    
    document.getElementById('total-amount').innerText = '0';
</script>
