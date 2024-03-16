<style>
    .header {
        display: none;
    }

    .containerr {
        background-color: #333;
        /* Đen */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        max-width: 800px;
        color: #fff;
        /* Màu chữ trắng */
        margin-bottom: 20px;
    }

    .headerr {
        background-color: #000;
        /* Đen */
        height: 50px;
    }

    /* Checkout summary card styles */
    .card {
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #222;
        /* Màu đen đậm */
        font-weight: bold;
        color: #fff;
        /* Màu chữ trắng */
    }

    .card-title {
        color: #333;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .card-body {
        padding: 20px;
    }

    /* Table styles */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        color: #fff;
        /* Màu chữ trắng */
    }

    /* Button styles */
    .btnn {
        padding: 10px 20px;
        background-color: #222;
        /* Màu đen đậm */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    /* Countdown timer styles */
    .countdown-timer {
        font-size: 2rem;
        font-weight: bold;
        color: #fff;
    }

    /* Payment gateway styles */
    .payment-gateway {
        display: flex;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .payment-gateway img {
        max-width: 40px;
        margin-right: 10px;
    }

    /* Form styles */
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .form-check-input {
        margin-right: 5px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .form-check-label {
            font-size: 0.9rem;
        }

        .d-lg-block {
            display: none;
        }

        .card.d-lg-none {
            background-color: #222;
            /* Màu đen đậm */
            padding: 15px;
            margin-top: 10px;
            color: #fff;
            /* Màu chữ trắng */
        }
    }

    .headerr-pay {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .headerr-pay p {
        margin: 0;
        padding-top: 11px;
        margin-top: 0;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        color: #ffffff;
    }

    .payment-gateway .checkmark {
        display: none;
        color: green;
    }
</style>

<div class="containerr">
    <div class="headerr-pay">
        <!-- <?php
            print_r($selectedSeats);
            echo "<br>";
            print_r($theaterId);
            echo "<br>";
            print_r($seatIds);
            echo "<br>";
            print_r($showtime);
        ?> -->
        <p>Tóm tắt đơn hàng</p>
        <p>Tên phim:
            <?= htmlspecialchars($details['movieName'] ?? 'N/A') ?>
        </p>
        <p>Showtime:
            <?= htmlspecialchars($details['showtime'] ?? 'N/A') ?>
        </p>
    </div>
    <form action="index.php?page=process_booking" name="orn_ticketing_order_customer" method="post"
                            id="orderCheckoutForm">
   
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="ticketing-content ticketing-checkout-page">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <thead>
                                    <tr>
                                        <th>Mô tả</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                

                                    
                                    <?php foreach ($selectedSeats as $seatNumber): ?>
                                        <tr>
                                            <td>Chỗ ngồi:
                                                <?= htmlspecialchars($seatNumber) ?>
                                            </td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">
                                                <?= htmlspecialchars($ticketPrice) ?> đ
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="2">Tổng</td>
                                        <td class="text-right">
                                            <?= htmlspecialchars($details['totalAmount']) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="card-header-title text-muted">Hình thức thanh toán</div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="payment_gateway" value="momo">
                                <input type="hidden" name="payment_method" value="">
                                <div class="payment-gateway pg-momo clearfix active" data-pg="momo" data-pm="">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/momo-icon.png" alt="">
                                        Ví MoMo
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-payoo pm-qr-code clearfix" data-pg="payoo"
                                    data-pm="qr-payment">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/moveek-icon.png" alt="">
                                        Chuyển khoản / Quét mã QR
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-shopeepay clearfix" data-pg="shopeepay" data-pm="">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/shopeepay-icon.png" alt="">
                                        Ví ShopeePay
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-payoo pm-international-card clearfix" data-pg="payoo"
                                    data-pm="cc-payment">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/payoo-icon.png" alt="">
                                        Thẻ Visa, Master, JCB
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-payoo pm-internal-card clearfix" data-pg="payoo"
                                    data-pm="bank-payment">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/payoo-icon.png" alt="">
                                        Thẻ ATM (Thẻ nội địa)
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-foxpay clearfix" data-pg="foxpay" data-pm="">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/foxpay-icon.png" alt="">
                                        Ví Foxpay
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                                <div class="payment-gateway pg-moveek pm-moveek-credits clearfix moveek-credits-guide"
                                    data-pg="moveek" data-pm="moveek-credits">
                                    <i class="fe fe-check-circle pg-checked"></i>
                                    <div class="pg-info">
                                        <img src="https://cdn.moveek.com/bundles/ornweb/img/moveek-icon.png" alt="">
                                        Moveek Credits
                                        <span class="checkmark">&#10003;</span> <!-- Biểu tượng checkmark -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] != null): ?>
                            <div class="card">
                                <div class="card-header bg-light">
                                    <div class="card-header-title text-muted">Thông tin cá nhân</div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="orn_ticketing_order_customer_fullname">Họ và tên</label>
                                        <input type="text" id="orn_ticketing_order_customer_fullname"
                                            value="<?= $_SESSION['user']['name'] ?>"
                                            name="orn_ticketing_order_customer[fullname]" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="orn_ticketing_order_customer_email" class="required">Email</label>
                                        <input type="email" value="<?= $_SESSION['user']['email'] ?>"
                                            id="orn_ticketing_order_customer_email" name="orn_ticketing_order_customer[email]"
                                            required="required" class="form-control">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card d-lg-none">
                                <div class="card-body">
                                    Vé đã mua không thể đổi hoặc hoàn tiền.<br>Mã vé sẽ được gửi <strong>01</strong> lần qua
                                    số điện thoại và email đã nhập. Vui lòng kiểm tra lại thông tin trước khi tiếp tục.
                                </div>
                            </div>
                                <?php
                                    for ($i = 0; $i < count($seatIds); $i++) {
                                        echo '<input type="hidden" name="selectedSeats[]" value="' . $seatIds[$i]['id'] . '">';
                                    }
                                ?>
                                <input type="hidden" name="theaterId" value="<?=$theaterId?>">
                                <input type="hidden" name="showtime" value="<?= $showtime?>">
                                <input type="hidden" name="movieName" value="<?= $details['movieName'] ?>">
                                <input type="hidden" name="showtime" value="<?= $details['showtime'] ?>">
                                <input type="hidden" name="totalAmount" value="<?= $details['totalAmount'] ?>">
                                <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">
                                <p class="clearfix flow-actions sticky-button-bars">
                                    <!-- <button type="submit" class="btnn btn-lg btn-primary" data-toggle="modal"
                                        data-target="#confirmModal">
                                        Thanh toán
                                    </button> -->
                                    <?php print_r($details['totalAmount']); ?>
                                    <a href=""><input type="submit" class="btnn btn-lg btn-primary" data-toggle="modal"
                                        data-target="#confirmModal" value="Thanh toán"></a>

                                </p>
    </form>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            Vui lòng <a href="index.php?page=login">đăng nhập</a> để tiếp tục.
                        </div>
                    <?php endif; ?>
</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Lắng nghe sự kiện khi nút "Thanh toán" được bấm
        document.querySelector('.btn-primary').addEventListener('click', function () {
            // Hiển thị modal bằng cách thêm lớp "show" vào modal và backdrop
            document.querySelector('#confirmModal').classList.add('show');
            document.querySelector('.modal-backdrop').classList.add('show');
        });

        // Lắng nghe sự kiện khi nút "Close" trong modal được bấm
        document.querySelector('.close').addEventListener('click', function () {
            // Ẩn modal bằng cách loại bỏ lớp "show" từ modal và backdrop
            document.querySelector('#confirmModal').classList.remove('show');
            document.querySelector('.modal-backdrop').classList.remove('show');
        });
    </script>

    <script>
        // Add your JavaScript code here

        // Example JavaScript for countdown timer
        function startCountdown(duration, display) {
            let timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            let countdownDisplay = document.querySelector(".countdown-timer");
            startCountdown(843, countdownDisplay); // Set the countdown duration in seconds
        };

    </script>
    <script>
        // JavaScript để thêm sự kiện click cho các phương thức thanh toán
        document.addEventListener("DOMContentLoaded", function () {
            const paymentGateways = document.querySelectorAll(".payment-gateway");

            paymentGateways.forEach(function (gateway) {
                gateway.addEventListener("click", function () {
                    // Ẩn biểu tượng checkmark trước khi hiển thị
                    const checkmarks = document.querySelectorAll(".checkmark");
                    checkmarks.forEach(function (checkmark) {
                        checkmark.style.display = "none";
                    });

                    // Hiển thị biểu tượng checkmark cho phương thức thanh toán được chọn
                    const checkmark = gateway.querySelector(".checkmark");
                    checkmark.style.display = "block";
                });
            });
        });
    </script>