<form action="index.php?page=register" method="post">
    <div class="main-background">
        <div class="rs-container">
            <input type="text" name="username" id="username" placeholder="Tên người dùng" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Xác nhận mật khẩu" required>
            <input type="hidden" name="role" value="1">
            <button type="submit" id="registerButton">Đăng Ký</button>
            <span id="warningMessage" style="display: none; color: red; margin-top: 10px;"></span>
            <p class="custom-link">Nếu đã có tài khoản, <a href="index.php?page=login">đăng nhập ngay</a>.</p>
        </div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var warningMessage = document.getElementById('warningMessage');
        document.getElementById('registerButton').addEventListener('mouseenter', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                this.style.position = 'absolute';
                const minWidth = 100;
                const maxWidth = Math.min(800, window.innerWidth - this.clientWidth);
                const minHeight = 100;
                const maxHeight = Math.min(600, window.innerHeight - this.clientHeight);
                const randomLeft = Math.random() * (maxWidth - minWidth) + minWidth;
                const randomTop = Math.random() * (maxHeight - minHeight) + minHeight;
                this.style.left = randomLeft + 'px';
                this.style.top = randomTop + 'px';
                warningMessage.style.display = 'block';
                warningMessage.textContent = 'Mật khẩu và xác nhận mật khẩu không khớp.';
            } else {
                warningMessage.style.display = 'none';
            }
        });
    });
</script>
<style>
    .custom-link {
    font-size: 16px;
    /* color: #333; */
    margin-top: 10px;
}

.custom-link a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.custom-link a:hover {
    text-decoration: underline;
}

</style>